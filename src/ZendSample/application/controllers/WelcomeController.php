<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/UserLogic.php';
require_once APPLICATION_PATH . '/utilities/SessionNamespace.php';

class WelcomeController extends Zend_Controller_Action {

    public function init(): void {
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }
    
    public function indexAction(): void {
        return;
    }

    public function signinAction(): void {
        if ($this->getRequest()->isGet()) {// To sign in page
            return;
        }
        // Sign in process
        $userEmail = $this->_getParam(USER_EMAIL);
        $userPassword = $this->_getParam(USER_PASSWORD);
        $user = UserLogic::searchUser($userEmail, $userPassword);
        if (is_null($user)) {
            // Redirect to sign-in page
            $this->_redirect('/kanban/welcome/signin');
        } else {
            // Make session
            if (Zend_Session::sessionExists()) {
                Zend_Session::destroy();
            }
            $defaultNamespace = SessionNamespace::getInstance()->getNamespace(DEFAULT_NAMESPACE);
            $defaultNamespace->user = serialize($user);
            $defaultNamespace->lock();
            // Redirect to user's home page
            $this->_redirect('/kanban/home/index');
        }
    }

    public function signoutAction(): void {
        // Delete session
        Zend_Session::destroy();
        $this->_redirect('/kanban/welcome/index');
    }

    public function signupAction(): void {
        if ($this->getRequest()->isGet()) {// To sign up page
            return;
        }
        // Sign up process
        $userEmail = $this->_getParam(USER_EMAIL);
        $userPassword = $this->_getParam(USER_PASSWORD);

        if (UserLogic::registerUser($userEmail, $userPassword)) {// To sign in page
            $this->_redirect('/kanban/welcome/signin');
        } else {// To sign up page again
            $this->_redirect('/kanban/welcome/signup');
        }
    }
}