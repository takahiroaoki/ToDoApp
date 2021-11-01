<?php

require_once APPLICATION_PATH . '/models/entities/Task.php';
require_once APPLICATION_PATH . '/models/daos/BaseDao.php';

class TaskDao extends BaseDao {
    // Fields
    private self $dao;

    // Constructor
    private function __construct() {
        parent::__construct();
    }

    // Methods
    // TaskDao is singleton pattern
    public static function getInstance(): self {
        if ($dao) {
            return $dao;
        } else {
            return new TaskDao();
        }
    }

    public function getAllTasks(string $userId): array {// If there are no tasks on DB, return array()
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