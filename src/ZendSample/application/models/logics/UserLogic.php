<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';

class UserLogic
{
    public static function searchUser(string $userEmail, string $userPassword): ?User
    {
        $registeredUser = UserDao::getInstance()->searchUser($userEmail);
        if (!is_null($registeredUser) && password_verify($userPassword, $registeredUser->getUserPassword())) {
            return $registeredUser;
        } else {
            return null;
        }
    }

    public static function registerUser(string $userEmail, string $userPassword): bool
    {
        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT);
        $isSuccess = UserDao::getInstance()->registerUser($userEmail, $userPassword);
        return $isSuccess;
    }
}
