<?php

class RegistrationModel extends Model
{
    public function checkUserData($data)
    {
        $user_data = $this->db->select( "users", "login", $data['login']);
        if (count($user_data) > 0) {
            $this->errors['login'] = 'Такой логин уже используется!';
        }
        $user_data = $this->db->select( "users", "email", $data['email']);
        if (count($user_data) > 0) {
            $this->errors['email'] = 'Такой email уже используется!';
        }
        return count($this->errors) === 0;
    }

    public function addUserData($data)
    {
        $this->db->insert("users", $data , FALSE);
    }
}
