<?php

class Task {
    private $taskId;
    private $taskTitle;
    private $taskContent;

    function __construct($taskId, $taskTitle, $taskContent) {
        $this->taskId = $taskId;
        $this->taskTitle = $taskTitle;
        $this->taskContent = $taskContent;
    }

    public function getTaskId() {
        return $this->taskId;
    }

    public function getTaskTitle() {
        return $this->taskTitle;
    }

    public function setTaskTitle($taskTitle) {
        $this->taskTitle = $taskTitle;
    }

    public function getTaskContent() {
        return $this->taskContent;
    }

    public function setTaskContent($taskcontent) {
        $this->taskContent = $taskContent;
    }
}