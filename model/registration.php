<?php

class RegistrationModel extends Model
{
    public function checkUserData($data)
    {
        $this->checkUserLogin($data['login']);
        $this->checkUserPassword($data['password'], $data['password_confirm']);
        $this->checkUserEmail($data['email']);
        $this->checkUserName($data['name']);
        return count($this->errors) === 0;
    }

    public function addUserData($data)
    {
        $salt = $data['login'];
        $hash = sha1($salt . $data['password'] );
        $data['password'] = $hash;
        unset($data['password_confirm']);
        $this->db->insert("users", $data, FALSE);
    }

    private function checkUserLogin($login)
    {
        $user_data = $this->db->select("users", "login", $login);
        if (count($user_data) > 0) {
            $this->errors['login'] = 'Такой логин уже используется! ';
        }
        if (strlen($login) < 6) {
            $this->errors['login'] .= 'Длина логина должна быть не менее 6 символов';
        }
    }

    private function checkUserPassword($password, $passwordConfirm)
    {
        preg_match("/^([a-zа-яё]+[\d]+)|([\d]+[a-zа-яё]+)$/i", $password, $matches);
        if (count($matches) === 0){
            $this->errors['password'] = 'Пароль должен содержать и буквы, и цифры. ';
        }
        if ($password !== $passwordConfirm) {
            $this->errors['password'] .= 'Не совпадают поля Пароль и Подтверждение пароля. ';
        }
        if (strlen($password) < 6) {
            $this->errors['password'] .= 'Длина пароля должна быть не менее 6 символов';
        }
    }

    private function checkUserEmail($email)
    {
        preg_match(
            "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/i",
            $email,
            $matches
        );
        if (count($matches) === 0){
            $this->errors['email'] = 'Неправильный email. ';
        }

        $user_data = $this->db->select("users", "email", $email);
        if (count($user_data) > 0) {
            $this->errors['email'] .= 'Такой email уже используется!';
        }
    }

    private function checkUserName($name)
    {
        if (strlen($name) < 2) {
            $this->errors['name'] = 'Длина имени должна быть не менее 2 символов. ';
        }
        preg_match(
            '/^[a-zA-Z]+$/i',
            $name,
            $matches
        );
        if (count($matches) === 0){
            $this->errors['name'] .= 'Имя состоит только из букв';
        }
    }
}
