<?php

require_once APPLICATION_PATH . '/models/daos/TaskDao.php';

class TaskLogic {

    public static function getAllTasks(string $userId): array {
        $allTasks = TaskDao::getInstance()->getAllTasks($userId);
        return $allTasks;
    }

    public static function registerTask(string $userId, string $taskTitle, string $taskContent): bool {
        $isSuccess = TaskDao::getInstance()->registerTask($userId, $taskTitle, $taskContent);
        return $isSuccess;
    }
}