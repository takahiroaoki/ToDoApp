<?php

require_once APPLICATION_PATH . '/models/daos/TaskDao.php';

class TaskLogic {

    public static function getAllTasks(string $userId): array {
        $allTasks = TaskDao::getInstance()->getAllTasks($userId);
        return $allTasks;
    }
}