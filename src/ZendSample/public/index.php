<?php

/**
 * [START] Define constants
 */
// User
define('USERS', 'users');
define('USER_ID', 'user_id');
define('USER_EMAIL', 'user_email');
define('USER_PASSWORD', 'user_password');
// Task
define('TASKS', 'tasks');
define('TASK_ID', 'task_id');
define('TASK_TITLE', 'task_title');
define('TASK_CONTENT', 'task_content');
define('TASK_STATUS', 'task_status');
define('TASK_TO_DO', 'To do');
define('TASK_IN_PROGRESS', 'In progress');
define('TASK_DONE', 'Done');
// Namespace of session
define('DEFAULT_NAMESPACE', 'default_namespace');

/**
 * [END] Define constants
 */

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';  

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV, 
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();