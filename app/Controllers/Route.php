<?php

namespace App\Controllers;

class Route extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form', 'database', 'general', 'fields']);

        $session = session();
    }
    public function forgot()
    {
        return view('auth/forgotpassword');
    }
    public function reset_password()
    {

        // if ($_POST) {
        //     if (!can_reset_password('', $userid, $new_pass_key)) {
        //         $data['message'] = 'Password key expired or invalid user';
        //         $data['error'] = true;
        //         $data['error1'] = 0;
        //         return view('auth/reset_password', $data);
        //     }

        //     $rules = [
        //         // 'roleID' => 'required',
        //         'password' => 'required|min_length[4]',
        //         'passwordr' => 'required|matches[password]',
        //     ];

        //     if (!$this->validate($rules)) {
        //         $data['message'] = $this->validator->getErrors();
        //         if (isset($data['message']['passwordr'])) {
        //             $data['message'] = $data['message']['passwordr'];
        //         }
        //         if (isset($data['message']['password'])) {
        //             $data['message'] .= $data['message']['password'];
        //         }
        //         $data['error'] = true;
        //         $data['error1'] = 0;
        //         return view('auth/reset_password', $data);
        //     } else {
        //         $password = $_POST['password'];
        //         $password = password_hash($password, PASSWORD_DEFAULT);
        //         $table    = 'user';
        //         $_id      = 'userID';

        //         $db      = \Config\Database::connect();
        //         $builder = $db->table('user');

        //         $builder->where($_id, $userid);
        //         $builder->where('newPassKey', $new_pass_key);
        //         $res = $builder->update([
        //             'password' => $password,
        //         ]);


        //         if ($res) {

        //             $bui = $db->table('user');

        //             $bui->where($_id, $userid);
        //             $bui->where('newPassKey', $new_pass_key);
        //             $res = $bui->update([
        //                 'newPassKey' => null,
        //                 'newPassKeyRequested' => null,
        //                 'lastPasswordChange' => date('Y-m-d H:i:s'),
        //                 'newPassKey' => $password,
        //             ]);

        //             $r = $db->table('user');

        //             $r->where($_id, $userid);
        //             $user          = $r->get()->getRow();


        //             if ($user->status == 1) {
        //                 if (strpos($user->username, '@')) {
        //                     send_simple_email($user->username, 'Password Reset', $message = 'Successful');
        //                 }
        //                 $data['message'] = 'Your password has been reset. Please login now!';
        //                 $data['error'] = false;
        //                 $data['error1'] = 1;
        //                 return view('auth/reset_password', $data);
        //             } else {
        //                 $data['message'] = 'Error resetting your password. Try again.';
        //                 $data['error'] = true;
        //                 return view('auth/reset_password', $data);
        //             }

        //             $data['message'] = '';
        //             $data['error'] = false;
        //             $data['error1'] = 0;
        //             return view('auth/reset_password', $data);
        //         }
        //     }
        // }
        $data['message'] = '';
        $data['error'] = '';
        $data['error1'] = 0;
        return view('auth/reset_password', $data);
    }
    public function login()
    {
        return view('auth/login');
    }
    public function dashboard()
    {

        if (session()->has('staff')) {
            $GLOBALS['SELECTED'] = 'dashboard';

            return view('dashboard');
        } else {
            return view('auth/login');
        }
    }
    public function addcoach()
    {
        if (session()->has('staff')) {
            $GLOBALS['SELECTED'] = 'member';

            return view('addcoach');
        } else {
            return view('auth/login');
        }
    }
    public function addstaff()
    {
        if (session()->has('staff')) {
            $GLOBALS['SELECTED'] = 'member';

            return view('addstaff');
        } else {
            return view('auth/login');
        }
    }
    public function addstudent()
    {
        if (session()->has('staff')) {
            $GLOBALS['SELECTED'] = 'member';

            return view('addstudent');
        } else {
            return view('auth/login');
        }
    }
    public function noticeboard()
    {
        if (session()->has('staff')) {
            $GLOBALS['SELECTED'] = 'noticeboard';

            return view('noticeboard');
        } else {
            return view('auth/login');
        }
    }
}
