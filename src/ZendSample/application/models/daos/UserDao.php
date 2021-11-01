<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/daos/BaseDao.php';

class UserDao extends BaseDao {
    // Fields
    private self $dao;

    // Constructor
    private function __construct() {
        parent::__construct();
    }

    // Methods
    // UserDao is singleton pattern
    public static function getInstance(): self {
        if (is_null($dao)) {
            return new UserDao();
        } else {
            return $dao;
        }
    }

    public function searchUser(string $userEmail): ?User {
        $query = 'SELECT * FROM ' . USERS . ' WHERE ' . USER_EMAIL . ' = ?;';
        $result = $this->db->fetchRow($query, $userEmail);
        
        if (is_null($result[USER_ID])) {// If not registered, return null
            $registeredUser = null;
        } else {
            $registeredUser = new User($result[USER_ID], $result[USER_EMAIL], $result[USER_PASSWORD]);
        }
        return $registeredUser;
    }

    public function registerUser(string $userEmail, string $userPassword): bool {
        $userData = array(
            USER_EMAIL => $userEmail,
            USER_PASSWORD => $userPassword
        );

        try {
            $this->db->insert(USERS, $userData);
            $isSuccess = true;            
        } catch (Exception $e) {
            $isSuccess = false;
        }
        return $isSuccess;
    }
}