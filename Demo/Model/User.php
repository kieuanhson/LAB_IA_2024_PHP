<?php

class User {
    public $username;
    public $password;
    public $fullName;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->fullName = 'ABC';
    }
}