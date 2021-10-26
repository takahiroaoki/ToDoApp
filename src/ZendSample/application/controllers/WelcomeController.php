<?php

require_once 'Zend/Controller/Action.php';

class WelcomeController extends Zend_Controller_Action {
    
    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $msg = "Welcome, " . $this->_getParam('user_name') . "!!" . PHP_EOL;
        } else {
            $msg = "Let me know your name!";
        }
        $this->view->assign('message', $msg);
    }
}