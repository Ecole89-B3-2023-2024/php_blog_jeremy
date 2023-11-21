<?php

class User {
    public $id;
    public $name;
    public $first_name;
    public $login;
    public $email;
    public $password;

    public function __construct($sent_id, $sent_name, $sent_first_name, $sent_login, $sent_email, $sent_password) {
        $this->id = $sent_id;
        $this->name = $sent_name;
        $this->first_name = $sent_first_name;
        $this->login = $sent_login;
        $this->email = $sent_email;
        $this->password = $sent_password;
    }
}