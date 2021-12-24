<?php

require_once APPLICATION_PATH . '/utilities/Log.php';

class BaseController extends Zend_Controller_Action
{
    public function preDispatch(): void
    {
        parent::preDispatch();
        
        // regenerate session ID in every request
        Zend_Session::regenerateId();

        // log
        $userId = SessionData::getUserIdInSession();
        Log::getLogWriter()->log(
            Log::getMessage($userId, $GLOBALS['LOG_ACCESS'] . ', ' . $_SERVER['REQUEST_URI']),
            Zend_Log::INFO
        );

        // Enable to use global variables in template files.
        foreach ($GLOBALS as $key => $value) {
            $this->view->assign($key, $value);
        }
    }
}
