<?php

require_once 'Zend/Controller/Front.php';
require_once 'Zend/Controller/Router/Route.php';

$front = Zend_Controller_Front::getInstance();
$router = $front->getRouter();

/** routing */
$router->addRoute(
    'normal-routing',
    new Zend_Controller_Router_Route(
            'kanban/:controller/:action',
            array(
                'module' => 'default',
                'controller' => 'welcome',
                'action' => 'index'
            )
        )
);
