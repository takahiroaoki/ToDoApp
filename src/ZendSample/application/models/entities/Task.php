<?php

class Task {
    // Fields
    private string $taskId;
    private string $taskTitle;
    private string $taskContent;
    private string $taskStatus;// 0: To do, 1: In progress, 2: Done

    // Constructor
    public function __construct(string $taskId, string $taskTitle, string $taskContent, string $taskStatus) {
        $this->taskId = $taskId;
        $this->taskTitle = $taskTitle;
        $this->taskContent = $taskContent;
        $this->taskStatus = $taskStatus;
    }

    // Getter & Setter
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

    public function setTaskContent(string $taskContent): void {
        $this->taskContent = $taskContent;
    }

    public function getTaskStatus(): string {
        return $this->taskStatus;
    }

    public function setTaskStatus(string $taskStatus): void {
        $this->taskStatus = $taskStatus;
    }
}