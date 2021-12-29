<?php

require_once APPLICATION_PATH . '/controllers/BaseController.php';
require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/TaskLogic.php';
require_once APPLICATION_PATH . '/utilities/SessionData.php';

class HomeController extends BaseController
{
    public function preDispatch(): void
    {
        parent::preDispatch();

        // Login check
        $user = SessionData::getUserInSession();
        if (is_null($user)) {
            $this->_redirect('/kanban/welcome/signin');
            return;
        }
    }
    
    public function indexAction(): void
    {
        $userId = SessionData::getUserIdInSession();
        $allTasks = TaskLogic::getAllTasks($userId);
        $this->view->assign(
            'taskStatus',
            array(
                $GLOBALS['TASK_TO_DO'],
                $GLOBALS['TASK_IN_PROGRESS'],
                $GLOBALS['TASK_DONE']
            )
        );
        $this->view->assign('allTasks', $allTasks);
        return;
    }

    public function updatetaskAction(): void
    {
        if ($this->getRequest()->isGet()) {// To home page
            $this->_redirect('/kanban/home/index');
            return;
        } else {// Update a task and to home page
            $taskId = $this->_getParam($GLOBALS['TASK_ID']);
            $taskTitle = $this->_getParam($GLOBALS['TASK_TITLE']);
            $taskContent = $this->_getParam($GLOBALS['TASK_CONTENT']);
            $taskStatus = $this->_getParam($GLOBALS['TASK_STATUS']);

            // Update a task on DB
            $userId = SessionData::getUserIdInSession();
            if (TaskLogic::updateTask($userId, $taskId, $taskTitle, $taskContent, $taskStatus)) {// Success
                $this->_redirect('/kanban/home/index');
                return;
            } else {// Failure
                // TODO: error message
                $this->_redirect('/kanban/home/index');
                return;
            }
        }
    }

    public function newtaskAction(): void
    {
        if ($this->getRequest()->isGet()) {// To new task page
            return;
        } else {// Register new task and to home page
            $taskTitle = $this->_getParam($GLOBALS['TASK_TITLE']);
            $taskContent = $this->_getParam($GLOBALS['TASK_CONTENT']);
            $taskStatus = $this->_getParam($GLOBALS['TASK_STATUS']);

            // Register new task to DB
            $userId = SessionData::getUserIdInSession();
            if (TaskLogic::registerTask($userId, $taskTitle, $taskContent, $taskStatus)) {// Success in registering a new task
                $this->_redirect('/kanban/home/index');
                return;
            } else {// Failure
                $this->_redirect('/kanban/home/newtask');
                return;
            }
        }
    }

    public function deletetaskAction(): void
    {
        if ($this->getRequest()->isGet()) {// Redirect to indexAction
            $this->_redirect('/kanban/home/index');
        } else {// Delete the task
            $taskId = $this->_getParam($GLOBALS['TASK_ID']);

            // Delete the task on DB
            $userId = SessionData::getUserIdInSession();
            if (TaskLogic::deleteTask($userId, $taskId)) {// Success in deleting the task
                $this->_redirect('/kanban/home/index');
                return;
            } else {// Failure
                $this->_redirect('/kanban/home/index');
                return;
            }
        }
    }
}
