<?php

class User {
    private $userEmail;
    private $userPassword;

    function __construct($userEmail, $userPassword) {
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function getUserEmail() {
        return $this->userEmail;
    }

    public function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;
    }

    public function getUserPassword() {
        return $this->userPassword;
    }

    public function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }
}