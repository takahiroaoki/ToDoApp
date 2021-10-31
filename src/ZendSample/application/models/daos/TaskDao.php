<?php

require_once APPLICATION_PATH . '/models/entities/Task.php';

class TaskDao {
    // TaskDao is singleton pattern

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
            return new TaskDao();
        }
    }

    public function getAllTasks($userId) {// If there are no tasks on DB, return array()
        $query = 'SELECT * FROM ' . TASKS . ' WHERE ' . USER_ID . ' = ?;';
        $result = $this->db->fetchAll($query, $userId);
        
        $allTasks = array();
        foreach ($result as $row) {
            $task = new Task($row[TASK_ID], $row[TASK_TITLE], $row[TASK_CONTENT]);
            array_push($allTasks, $task);
        }
        return $allTasks;
    }
}