<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/daos/BaseDao.php';

class UserDao extends BaseDao
{
    // Fields
    private self $dao;

    // Constructor
    private function __construct()
    {
        parent::__construct();
    }

    // Methods
    // UserDao is singleton pattern
    public static function getInstance(): self
    {
        if (is_null($dao)) {
            return new UserDao();
        } else {
            return $dao;
        }
    }

    public function searchUser(string $userEmail): ?User
    {
        $query = 'SELECT * FROM ' . $GLOBALS['USERS'] . ' WHERE ' . $GLOBALS['USER_EMAIL'] . ' = ?;';
        $result = $this->db->fetchRow($query, $userEmail);
        
        if (is_null($result[$GLOBALS['USER_ID']])) {// If not registered, return null
            $registeredUser = null;
        } else {
            $registeredUser = new User(
                $result[$GLOBALS['USER_ID']],
                $result[$GLOBALS['USER_EMAIL']],
                $result[$GLOBALS['USER_PASSWORD']]
            );
        }
        return $registeredUser;
    }

    public function registerUser(string $userEmail, string $userPassword): bool
    {
        $userData = array(
            $GLOBALS['USER_EMAIL'] => $userEmail,
            $GLOBALS['USER_PASSWORD'] => $userPassword
        );

        try {
            $this->db->insert($GLOBALS['USERS'], $userData);
            $isSuccess = true;
        } catch (Exception $e) {
            $isSuccess = false;
        }
        return $isSuccess;
    }
}
