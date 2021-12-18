<?php

class BaseController extends Zend_Controller_Action {

    public function init(): void {
        // The layouts are basically common among all pages
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }
}