<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';

class UserLogic {
    public static function searchUser($userEmail, $userPassword) {

        $registeredUser = UserDao::getInstance()->searchUser($userEmail);
        
        if (!is_null($registeredUser) && $userPassword == $registeredUser->getUserPassword()) {
            return $registeredUser;
        } else {
            return null;
        }
    }

    public static function registerUser($userEmail, $userPassword) {

        $isSuccess = UserDao::getInstance()->registerUser($userEmail, $userPassword);
        return $isSuccess;
    }
}