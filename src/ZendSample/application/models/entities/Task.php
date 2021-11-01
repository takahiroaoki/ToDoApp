<?php

class Task {
    private string $taskId;
    private string $taskTitle;
    private string $taskContent;

    public function __construct(string $taskId, string $taskTitle, string $taskContent) {
        $this->taskId = $taskId;
        $this->taskTitle = $taskTitle;
        $this->taskContent = $taskContent;
    }

    public function getTaskId(): string {
        return $this->taskId;
    }

    public function getTaskTitle(): string {
        return $this->taskTitle;
    }

    public function setTaskTitle(string $taskTitle): void {
        $this->taskTitle = $taskTitle;
    }

    public function getTaskContent(): string {
        return $this->taskContent;
    }

    public function setTaskContent(string $taskcontent): void {
        $this->taskContent = $taskContent;
    }
}