<?php

//require_once APPLICATION_PATH . '/models/entities/User.php';

class UserDao {
    public static function search_user($user_email) {
        // TODO: search the user's password from 'users' table by $user_email
        $registered_user = new User();
        $registered_user->set_user_email($user_email);
        $registered_user->set_user_password('password');
        return $registered_user;
    }
}