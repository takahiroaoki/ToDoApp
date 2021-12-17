<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/TaskLogic.php';
require_once APPLICATION_PATH . '/utilities/LoginCheck.php';

class HomeController extends Zend_Controller_Action {

    public ?string $userId = null;

    public function init(): void {
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }

    public function preDispatch(): void {
        parent::preDispatch();

        // Login check
        $user = LoginCheck::getUserInSession();
        if (!is_null($user)) {
            $this->userId = $user->getUserId();
            return;
        } else {
            $this->_redirect('/kanban/welcome/signin');
            return;
        }
    }
    
    public function indexAction(): void {
        $allTasks = TaskLogic::getAllTasks($this->userId);
        $this->view->assign('isLogin', '1');
        $this->view->assign('taskStatus', array(TASK_TO_DO, TASK_IN_PROGRESS, TASK_DONE));
        $this->view->assign('allTasks', $allTasks);
        return;
    }

    public function updatetaskAction(): void {
        if ($this->getRequest()->isGet()) {// To home page
            $this->_redirect('/kanban/home/index');
            return;
        } else {// Update a task and to home page
            $taskId = $this->_getParam(TASK_ID);
            $taskTitle = $this->_getParam(TASK_TITLE);
            $taskContent = $this->_getParam(TASK_CONTENT);
            $taskStatus = $this->_getParam(TASK_STATUS);

            // Update a task on DB
            if (TaskLogic::updateTask($this->userId, $taskId, $taskTitle, $taskContent, $taskStatus)) {// Success
                $this->_redirect('/kanban/home/index');
                return;
            } else {// Failure
                // TODO: error message
                $this->_redirect('/kanban/home/index');
                return;
            }
        }
    }

    public function newtaskAction(): void {

        if ($this->getRequest()->isGet()) {// To new task page
            return;
        } else {// Register new task and to home page
            $taskTitle = $this->_getParam(TASK_TITLE);
            $taskContent = $this->_getParam(TASK_CONTENT);
            $taskStatus = $this->_getParam(TASK_STATUS);

            // Register new task to DB
            if (TaskLogic::registerTask($this->userId, $taskTitle, $taskContent, $taskStatus)) {// Success in registering a new task
                $this->_redirect('/kanban/home/index');
                return;
            } else {// Failure
                $this->_redirect('/kanban/home/newtask');
                return;
            }
        }
    }

    public function deletetaskAction(): void {

        if ($this->getRequest()->isGet()) {// Redirect to indexAction
            $this->_redirect('/kanban/home/index');
        } else {// Delete the task
            $taskId = $this->_getParam(TASK_ID);

            // Delete the task on DB
            if (TaskLogic::deleteTask($this->userId, $taskId)) {// Success in deleting the task
                $this->_redirect('/kanban/home/index');
                return;
            } else {// Failure
                $this->_redirect('/kanban/home/index');
                return;
            }
        }
    }
}