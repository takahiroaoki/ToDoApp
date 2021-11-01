<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';

class UserLogic {

    public static function searchUser(string $userEmail, string $userPassword): ?User {
        $registeredUser = UserDao::getInstance()->searchUser($userEmail);
        if (!is_null($registeredUser) && $userPassword == $registeredUser->getUserPassword()) {
            return $registeredUser;
        } else {
            return null;
        }
    }

    public static function registerUser(string $userEmail, string $userPassword): bool {
        $isSuccess = UserDao::getInstance()->registerUser($userEmail, $userPassword);
        return $isSuccess;
    }
}