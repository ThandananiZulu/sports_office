<?php

namespace App\Controllers;

use App\Libraries\Oauth;
use \OAuth2\Request;
use Codeigniter\API\ResponseTrait;

class User extends BaseController
{
    use ResponseTrait;

    public function create()
    {

        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();
        $r = $request->createFromGlobals();

        $body = json_decode($body);
        if ($code == 200) {
            $username = $r->request['username'];
            $db = \Config\Database::connect();
            $builder = $db->table('staff');
            $builder->select('staff.*');

            $builder->where('staff.staffEmail', $username);

            $query = $builder->get();
            $user = $query->getRow();

            $session = session();
            $session->set('staff', $user);

            $body->user = $user;
            if (!$user) {
                $body = array('error' => true, 'message' => 'Could Not login');
            } else {
                $body->error = false;
            }
        } else {
            $body->error = true;
        }

        return $this->respond($body, $code);
    }
    public function forgotPassword()
    {
        helper(['form', 'database', 'general']);

        $username = $this->request->getVar('username');

        if ($username) {
            if (total_rows('user', ['username' => $username, 'status' => 0]) <= 0) {
                $output['message'] = 'Sorry, username could not be found or is not Active';
                $output['error'] = true;
                return $this->respond($output);
            }


            $db = \Config\Database::connect();
            $builder = $db->table('oauth_users');
            $builder->select('oauth_users.*,userID');
            $builder->join('user', 'oauth_users.username = user.username');
            $builder->where('oauth_users.username', $username);

            $query = $builder->get();
            $user = $query->getRow();


            $new_pass_key = md5($username);
            $b = $db->table('user');
            $b->where('username', $user->username);
            $res = $b->update([
                'newPassKey'           => $new_pass_key,
                'newPassKeyRequested' => date('Y-m-d H:i:s'),
            ]);

            if ($res) {
                $link = base_url('public/route/reset_password/' . $user->userID . '/' . $new_pass_key);

                // send_email($user->username, 'Password Reset', $message = 'Hi, Click below link to reset password <a href="' . $link . '">RESET</a>');


                return $this->respondCreated(array('message' => 'Please follow instruction sent to you.', 'error' => false));
            }
        } else {
            return $this->respondCreated(array('message' => 'Invalid username.', 'error' => true));
        }
    }
}
