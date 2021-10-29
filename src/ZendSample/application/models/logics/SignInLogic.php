<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';

class SignInLogic {
    public static function verifyUser($userEmail, $userPassword) {

        $registeredUser = UserDao::getInstance()->searchUser($userEmail);
        
        if ($userPassword == $registeredUser->getUserPassword()) {
            $isVerified = true;
        } else {
            $isVerified = false;
        }
        return $isVerified;
    }
}