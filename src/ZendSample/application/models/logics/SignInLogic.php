<?php

require_once APPLICATION_PATH . '/models/daos/UserDao.php';

class SignInLogic {
    public static function verify_user($user_email, $user_password) {

        $registered_user = UserDao::get_instance()->search_user($user_email);
        
        if ($user_password == $registered_user->get_user_password()) {
            $is_valid = true;
        } else {
            $is_valid = false;
        }
        return $is_valid;
    }
}