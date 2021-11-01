<?php

class User {
    private string $userId;
    private string $userEmail;
    private string $userPassword;

    public function __construct(string $userId, string $userEmail, string $userPassword) {
        $this->$userId = $userId;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function getUserId(): string {
        return $this->userId;
    }

    public function getUserEmail(): string {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): void {
        $this->userEmail = $userEmail;
    }

    public function getUserPassword(): string {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword): void {
        $this->userPassword = $userPassword;
    }
}