<?php

class LoginModel extends Model
{
    public function checkLogin($data)
    {
        $userRowForLogin = $this->db->select('users', 'login', $data['login']);
        if (!($userRowForLogin)) {
            return false;
        }
        $salt = $data['login'];
        $hash = sha1($salt . $data['password'] );
        $userRowForPassword = $this->db->select('users', 'password', $hash);
        if (!($userRowForPassword)) {
            return false;
        }
        return !array_diff($userRowForLogin, $userRowForPassword);
    }
}
