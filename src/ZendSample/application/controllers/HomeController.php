<?php

class HomeController extends Zend_Controller_Action {

    public function init() {
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }
    
    public function indexAction() {
        // session check
        if (Zend_Session::sessionExists()) {
            return;
        } else {
            $this->_redirect('/welcome/signin');
        }
    }
}