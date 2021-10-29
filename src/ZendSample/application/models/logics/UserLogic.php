<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';

class UserLogic {
    public static function verifyUser($userEmail, $userPassword) {

        $registeredUser = UserDao::getInstance()->searchUser($userEmail);
        
        if ($userPassword == $registeredUser->getUserPassword()) {
            $isVerified = true;
        } else {
            $isVerified = false;
        }
        return $isVerified;
    }

    public static function registerUser($userEmail, $userPassword) {

        $isSuccess = UserDao::getInstance()->registerUser($userEmail, $userPassword);
        return $isSuccess;
    }
}