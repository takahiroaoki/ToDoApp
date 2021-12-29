<?php

require_once APPLICATION_PATH . '/utilities/Log.php';

class BaseController extends Zend_Controller_Action
{
    public function preDispatch(): void
    {
        parent::preDispatch();
        
        // Enable to use global variables in template files.
        foreach ($GLOBALS as $key => $value) {
            $this->view->assign($key, $value);
        }

        // regenerate session ID in every request
        Zend_Session::regenerateId();

        // log
        $userId = SessionData::getUserIdInSession();
        Log::getLogWriter()->log(
            Log::getMessage($userId, $GLOBALS['LOG_ACCESS'] . ', ' . $_SERVER['REQUEST_URI']),
            Zend_Log::INFO
        );

        // login check for template
        $this->view->assign('isLogin', !is_null($userId));
    }
}
