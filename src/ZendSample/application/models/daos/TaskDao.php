<?php

require_once APPLICATION_PATH . '/models/entities/Task.php';
require_once APPLICATION_PATH . '/models/daos/BaseDao.php';

class TaskDao extends BaseDao
{
    // Fields
    private self $dao;

    // Constructor
    private function __construct()
    {
        parent::__construct();
    }

    // Methods
    // TaskDao is singleton pattern
    public static function getInstance(): self
    {
        if ($dao) {
            return $dao;
        } else {
            return new TaskDao();
        }
    }

    public function getAllTasks(string $userId): array
    {
        // If there are no tasks on DB, return array()
        $query = 'SELECT * FROM ' . TASKS . ' WHERE ' . USER_ID . ' = ?;';
        $result = $this->db->fetchAll($query, $userId);
        
        $allTasks = array();
        foreach ($result as $row) {
            $task = new Task($row[TASK_ID], $row[TASK_TITLE], $row[TASK_CONTENT], $row[TASK_STATUS]);
            array_push($allTasks, $task);
        }
        return $allTasks;
    }

    public function updateTask(string $userId, string $taskId, string $taskTitle, string $taskContent, string $taskStatus): bool
    {
        $taskData = array(
            TASK_TITLE => $taskTitle,
            TASK_CONTENT => $taskContent,
            TASK_STATUS => $taskStatus
        );
        $where = array(
            USER_ID . ' = ' . $userId,
            TASK_ID . ' = ' . $taskId
        );
        try {
            $n = $this->db->update(TASKS, $taskData, $where);
            if ($n == 1) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
        } catch (Exception $e) {
            $isSuccess = false;
        }
        return $isSuccess;
    }

    public function registerTask(string $userId, string $taskTitle, string $taskContent, string $taskStatus): bool
    {
        $taskData = array(
            USER_ID => $userId,
            TASK_TITLE => $taskTitle,
            TASK_CONTENT => $taskContent,
            TASK_STATUS => $taskStatus
        );
        try {
            $this->db->insert(TASKS, $taskData);
            $isSuccess = true;
        } catch (Exception $e) {
            $isSuccess = false;
        }
        return $isSuccess;
    }

    public function deleteTask(string $userId, string $taskId): bool
    {
        $where = array(
            USER_ID . ' = ' . $userId,
            TASK_ID . ' = ' . $taskId
        );
        try {
            $n = $this->db->delete(TASKS, $where);
            if ($n == 1) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
        } catch (Exception $e) {
            $isSuccess = false;
        }
        return $isSuccess;
    }
}
