<?php

require_once 'Zend/Controller/Action.php';
require_once 'Zend/View.php';
require_once 'Zend/Layout.php';
require_once 'Zend/Config/Ini.php';

class WelcomeController extends Zend_Controller_Action {

    public function init() {
        $layout_config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layout_config);
    }
    
    public function indexAction() {
        return;
    }

    public function signinAction() {
        if ($this->getRequest()->isGet()) {// To sign in page
            return;
        }
        // Sign in process
        // TODO: Verify user
        $user_email = $this->_getParam('user_email');
        $user_password = $this->_getParam('user_password');
        if ($user_email == 'user@example.com' && $user_password == 'password') {
            // Redirect to user's home page
            $this->_redirect('/home/index');
        } else {
            // Redirect to sign-in page
            $this->_redirect('/welcome/signin');
        }
    }

    public function signoutAction() {
        $this->_redirect('/welcome/index');
    }
}