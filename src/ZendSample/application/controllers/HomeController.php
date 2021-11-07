<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/TaskLogic.php';
require_once APPLICATION_PATH . '/utilities/SessionNamespace.php';

class HomeController extends Zend_Controller_Action {

    public function init(): void {
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }
    
    public function indexAction(): void {
        // session check
        if (! Zend_Session::sessionExists()) {
            $this->_redirect('/welcome/signin');
            return;
        }

        $defaultNamespace = SessionNamespace::getInstance()->getNamespace(DEFAULT_NAMESPACE);
        $user = User::cast(unserialize($defaultNamespace->user));
        $userId = $user->getUserId();
        $allTasks = TaskLogic::getAllTasks($userId);
        $this->view->assign('allTasks', $allTasks);
        return;
    }

    public function newtaskAction(): void {
        // session check
        if (! Zend_Session::sessionExists()) {
            $this->_redirect('/welcome/signin');
            return;
        }

        $defaultNamespace = SessionNamespace::getInstance()->getNamespace(DEFAULT_NAMESPACE);
        $user = User::cast(unserialize($defaultNamespace->user));
        $userId = $user->getUserId();
        
        if ($this->getRequest()->isGet()) {// To new task page
            return;
        } else {// Register new task and to home page
            $taskTitle = $this->_getParam(TASK_TITLE);
            $taskContent = $this->_getParam(TASK_CONTENT);

            // TODO register new task to DB
            if (TaskLogic::registerTask($userId, $taskTitle, $taskContent)) {// Success in registering a new tak
                $this->_redirect('/home/index');
                return;
            } else {// Failure
                $this->_redirect('/home/newtask');
                return;
            }
        }
    }
}