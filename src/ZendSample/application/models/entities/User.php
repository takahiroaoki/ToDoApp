<?php

class User
{

    // Fields
    private string $userId;
    private string $userEmail;
    private string $userPassword;// hashed by password_hash() function

    // Constructor
    public function __construct(string $userId, string $userEmail, string $userPassword)
    {
        $this->userId = $userId;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    // Getter & Setter
    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = $userPassword;
    }

    // Methods
    public static function cast(object $obj): self
    {
        try {
            return $obj;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
