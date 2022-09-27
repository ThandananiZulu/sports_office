<?php


function has_role_permission()
{
}
function can_reset_password($staff, $userid, $new_pass_key)
{
    $table = 'user';
    $_id   = 'userID';

    $db = \Config\Database::connect();
    $b = $db->table('user');

    $b->where($_id, $userid);
    $b->where('newPassKey', $new_pass_key);
    $user = $b->get()->getRow();
    if ($user) {
        $timestamp_now_minus_1_hour = time() - (60 * 60);
        $new_pass_key_requested     = strtotime($user->newPassKeyRequested);
        if ($timestamp_now_minus_1_hour > $new_pass_key_requested) {
            return false;
        }

        return true;
    }

    return false;
}
function total_rows($table, $where = [])
{
    $db = \Config\Database::connect();
    $builder = $db->table($table);
    if (is_array($where)) {
        if (sizeof($where) > 0) {
            $builder->where($where);
        }
    } elseif (strlen($where) > 0) {
        $builder->where($where);
    }
    return $builder->countAllResults();
}
function get_sports()
{
    $db = \Config\Database::connect();
    $builder = $db->table('sport');
    $data = $builder->get();

    $data = $data->getResultArray();

    return $data;
}
function get_file_name($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('studentfiles');
    $builder->select("name");
    $builder->where('id', $id);
    $data = $builder->get();

    $data = $data->getRow();

    return $data;
}
function set_user_details($username, $password)
{
    $db = \Config\Database::connect();
    $builder = $db->table('oauth_users');
    $data =  $builder->insert(array('username' => $username, 'password' => $password, 'scope' => "app"));


    return $data;
}
