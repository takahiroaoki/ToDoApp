<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';
require_once APPLICATION_PATH . '/utilities/Validators/EmailAddressValidator.php';
require_once APPLICATION_PATH . '/utilities/Validators/PasswordValidator.php';

class UserLogic
{
    public static function searchUser(string $userEmail, string $userPassword): ?User
    {
        // Validate $userEmail
        $validator = new EmailAddressValidator();
        if (!$validator->isValid($userEmail)) {
            return null;
        }

        // Search the user whoes email adress equals to $userEmail
        $registeredUser = UserDao::getInstance()->searchUser($userEmail);
        if (!is_null($registeredUser) && password_verify($userPassword, $registeredUser->getUserPassword())) {
            return $registeredUser;
        } else {
            return null;
        }
    }

    public static function registerUser(string $userEmail, string $userPassword): bool
    {
        // Validate $userEmail and $userPassword
        $emailAddressValidator = new EmailAddressValidator();
        $passwordValidator = new PasswordValidator();
        if (!$emailAddressValidator->isValid($userEmail) || !$passwordValidator->isValid($userPassword)) {
            return false;
        }

        // Hash password and register the user
        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT);
        $isSuccess = UserDao::getInstance()->registerUser($userEmail, $userPassword);
        return $isSuccess;
    }
}
