<?php

class User {
    private $userId;
    private $userEmail;
    private $userPassword;

    function __construct($userId, $userEmail, $userPassword) {
        $this->$userId = $userId;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function getUserId() {
        return $this->userId;
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