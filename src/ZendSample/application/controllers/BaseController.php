<?php

require_once APPLICATION_PATH . '/utilities/Log.php';

class BaseController extends Zend_Controller_Action
{
    public function init(): void
    {
        // The layouts are basically common among all pages
        $layoutConfig = new Zend_Config_Ini(APPLICATION_PATH . '/configs/common-layout-config.ini', 'layout');
        Zend_Layout::startMvc($layoutConfig);
    }

    public function preDispatch(): void
    {
        parent::preDispatch();

        // regenerate session ID in every request
        Zend_Session::regenerateId();

        // log
        $userId = SessionData::getUserIdInSession();
        Log::getLogWriter()->log(
            Log::getMessage($userId, LOG_ACCESS . ', ' . $_SERVER['REQUEST_URI']),
            Zend_Log::INFO
        );
    }
}
