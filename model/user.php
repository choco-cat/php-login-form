<?php

class LoginModel extends Model
{
    public function checkLogin($data)
    {
        $userRowForLogin = $this->db->select('users', 'login', $data['login']);
        if (!($userRowForLogin)) {
            $this->errors['login'] = 'Логин не существует!';
            return false;
        }
        $salt = $data['login'];
        $hash = sha1($salt . $data['password'] );
        $userRowForPassword = $this->db->select('users', 'password', $hash);
        if (!($userRowForPassword)) {
            $this->errors['password'] = 'Неверный пароль!';
            return false;
        }
        return !array_diff($userRowForLogin, $userRowForPassword);
    }
}
