<?php

require_once 'Zend/Controller/Action.php';
require_once 'Zend/View.php';
require_once 'Zend/Layout.php';
require_once 'Zend/Config/Ini.php';

class WelcomeController extends Zend_Controller_Action {

    public function init() {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($config);
    }
    
    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $msg = 'Welcome, ' . $this->_getParam('user_name') . '!!' . PHP_EOL;
        } else {
            $msg = 'Let me know your name!';
        }
        $this->view->assign('message', $msg);
    }
}