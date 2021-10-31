<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/UserLogic.php';

class WelcomeController extends Zend_Controller_Action {

    public function init() {
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }
    
    public function indexAction() {
        return;
    }

    public function signinAction() {
        if ($this->getRequest()->isGet()) {// To sign in page
            return;
        }
        // Sign in process
        $userEmail = $this->_getParam(USER_EMAIL);
        $userPassword = $this->_getParam(USER_PASSWORD);
        $user = UserLogic::searchUser($userEmail, $userPassword);
        if (is_null($user)) {
            // Redirect to sign-in page
            $this->_redirect('/welcome/signin');
        } else {
            // Make session
            $defaultNamespace = new Zend_Session_Namespace(DEFAULT_NAMESPACE);
            $defaultNamespace->user = $user;
            $defaultNamespace->lock();
            // Redirect to user's home page
            $this->_redirect('/home/index');
        }
    }

    public function signoutAction() {
        // Delete session
        Zend_Session::destroy();
        $this->_redirect('/welcome/index');
    }

    public function signupAction() {
        if ($this->getRequest()->isGet()) {// To sign up page
            return;
        }
        // Sign up process
        $userEmail = $this->_getParam(USER_EMAIL);
        $userPassword = $this->_getParam(USER_PASSWORD);

        if (UserLogic::registerUser($userEmail, $userPassword)) {// To sign in page
            $this->_redirect('/welcome/signin');
        } else {// To sign up page again
            $this->_redirect('/welcome/signup');
        }
    }
}