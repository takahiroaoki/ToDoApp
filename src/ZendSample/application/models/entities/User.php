<?php

class User {
    private $user_id;
    private $user_email;
    private $user_password;

    public function get_user_email() {
        return $this->user_email;
    }

    public function set_user_email($user_email) {
        $this->user_email = $user_email;
    }

    public function get_user_password() {
        return $this->user_password;
    }

    public function set_user_password($user_password) {
        $this->user_password = $user_password;
    }
}