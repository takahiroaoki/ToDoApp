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
        if (Zend_Session::sessionExists()) {
            // Get userId from session
            $defaultNamespace = SessionNamespace::getInstance()->getNamespace(DEFAULT_NAMESPACE);
            $user = User::cast(unserialize($defaultNamespace->user));
            $userId = $user->getUserId();// $userId=1 as test.
            $allTasks = TaskLogic::getAllTasks($userId);
            $this->view->assign('allTasks', $allTasks);
            return;
        } else {
            $this->_redirect('/welcome/signin');
        }
    }
}