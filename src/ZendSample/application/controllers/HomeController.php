<?php

class HomeController extends Zend_Controller_Action {

    public function init() {
        $layout_config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layout_config);
    }
    
    public function indexAction() {
        return;
    }
}