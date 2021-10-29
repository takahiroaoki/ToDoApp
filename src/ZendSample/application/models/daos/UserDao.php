<?php

require_once APPLICATION_PATH . '/models/entities/User.php';

class UserDao {
    // UserDao is singleton pattern

    private $db;
    private $dao;

    private function __construct() {
        // make connection to DB
        $dbConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/db-config.ini', 'db');
        $adapter = new Zend_Config_Ini(APPLICATION_PATH . '/configs/db-config.ini', 'adapter');
        $this->db = Zend_Db::factory($adapter->name, $dbConfig);
        $this->db->getConnection();
    }

    public static function getInstance() {
        if ($dao) {
            return $dao;
        } else {
            return new UserDao();
        }
    }

    public function searchUser($userEmail) {
        $query = 'SELECT * FROM users WHERE user_email = ?;';
        $result = $this->db->fetchRow($query, $userEmail);
        $registeredUser = new User($result['user_email'], $result['user_password']);
        return $registeredUser;
    }
}