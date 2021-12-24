<?php

require_once APPLICATION_PATH . '/SmartyView.php';

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function run()
    {
        $this->initSmarty();
        parent::run();
    }

    private function initSmarty()
    {
        // viewをSmartyで初期化
        $view = new SmartyView();
        $render = new Zend_Controller_Action_Helper_ViewRenderer($view);
        $render->setViewBasePathSpec(APPLICATION_PATH)
            ->setViewSuffix('tpl');
        Zend_Controller_Action_HelperBroker::addHelper($render);
    }
}

