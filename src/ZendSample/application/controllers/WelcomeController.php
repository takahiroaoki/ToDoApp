<?php

require_once APPLICATION_PATH . '/controllers/BaseController.php';
require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/UserLogic.php';
require_once APPLICATION_PATH . '/utilities/SessionNamespace.php';
require_once APPLICATION_PATH . '/utilities/LoginCheck.php';

class WelcomeController extends BaseController {
    
    public function indexAction(): void {
        return;
    }

    public function signinAction(): void {
        if ($this->getRequest()->isGet()) {// If GET method
            // If the user already signs in, redirect to home.
            $user = LoginCheck::getUserInSession();
            if (!is_null($user)) {
                $this->_redirect('/kanban/home/index');
                return;
            }
            // To signin page
            return;
        }
        // Sign in process
        $userEmail = $this->_getParam(USER_EMAIL);
        $userPassword = $this->_getParam(USER_PASSWORD);
        $user = UserLogic::searchUser($userEmail, $userPassword);
        if (is_null($user)) {
            // Redirect to sign-in page
            $this->_redirect('/kanban/welcome/signin');
            return;
        }
        $defaultNamespace = SessionNamespace::getInstance()->getNamespace(DEFAULT_NAMESPACE);
        $defaultNamespace->user = serialize($user);
        $defaultNamespace->lock();
        
        // Redirect to user's home page
        $this->_redirect('/kanban/home/index');
        return;
    }

    public function signoutAction(): void {
        // Delete session
        Zend_Session::destroy();
        $this->_redirect('/kanban/welcome/index');
    }

    public function signupAction(): void {
        if ($this->getRequest()->isGet()) {// If GET method
            // If the user already signs in, redirect to home.
            $user = LoginCheck::getUserInSession();
            if (!is_null($user)) {
                $this->_redirect('/kanban/home/index');
                return;
            }
            // To signup page
            return;
        }
        // Sign up process
        $userEmail = $this->_getParam(USER_EMAIL);
        $userPassword = $this->_getParam(USER_PASSWORD);

        if (UserLogic::registerUser($userEmail, $userPassword)) {// To sign in page
            $this->_redirect('/kanban/welcome/signin');
        } else {// To sign up page again
            $this->_redirect('/kanban/welcome/signup');
        }
    }
}