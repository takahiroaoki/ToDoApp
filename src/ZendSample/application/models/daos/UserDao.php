<?php

require_once APPLICATION_PATH . '/models/entities/User.php';

class UserDao {
    // UserDao is singleton pattern

    private $db;
    private $dao;

    private function __construct() {
        // make connection to DB
        $db_config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/db-config.ini', 'db');
        $adapter = new Zend_Config_Ini(APPLICATION_PATH . '/configs/db-config.ini', 'adapter');
        $this->db = Zend_Db::factory($adapter->name, $db_config);
        $this->db->getConnection();
    }

    public static function get_instance() {
        if ($dao) {
            return $dao;
        } else {
            return new UserDao();
        }
    }

    public function search_user($user_email) {
        $query = 'SELECT * FROM users WHERE user_email = ?;';
        $result = $this->db->fetchRow($query, $user_email);
        $registered_user = new User();
        $registered_user->set_user_email($result['user_email']);
        $registered_user->set_user_password($result['user_password']);
        return $registered_user;
    }
}