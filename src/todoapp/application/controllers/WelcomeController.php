<?php

require_once APPLICATION_PATH . '/controllers/BaseController.php';
require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/models/logics/UserLogic.php';
require_once APPLICATION_PATH . '/utilities/SessionNamespace.php';
require_once APPLICATION_PATH . '/utilities/SessionData.php';

class WelcomeController extends BaseController
{
    public function preDispatch(): void
    {
        parent::preDispatch();

        // redirect rule
        if ($this->shouldRedirect()) {
            $this->_redirect('/kanban/home/index');
            return;
        }
    }

    public function indexAction(): void
    {
        return;
    }

    public function signinAction(): void
    {
        // If GET method
        if ($this->getRequest()->isGet()) {
            // To signin page
            return;
        }

        // If POST method
        // Sign in process
        $userEmail = $this->_getParam($GLOBALS['USER_EMAIL']);
        $userPassword = $this->_getParam($GLOBALS['USER_PASSWORD']);
        $user = UserLogic::searchUser($userEmail, $userPassword);
        if (is_null($user)) {
            // Put error message in session
            $errMsg = 'Failure: Maybe, wrong combination of e-mail and password';
            SessionData::putErrMsgInsession($errMsg);
            // Redirect to sign-in page
            $this->_redirect('/kanban/welcome/signin');
            return;
        }
        // Put user in session
        SessionData::putUserInSession($user);
        
        // Redirect to user's home page
        $this->_redirect('/kanban/home/index');
        return;
    }

    public function signoutAction(): void
    {
        // Delete session
        Zend_Session::destroy();
        $this->_redirect('/kanban/welcome/index');
    }

    public function signupAction(): void
    {
        // If GET method
        if ($this->getRequest()->isGet()) {
            // To signup page
            return;
        }

        // If POST method
        // Sign up process
        $userEmail = $this->_getParam($GLOBALS['USER_EMAIL']);
        $userPassword = $this->_getParam($GLOBALS['USER_PASSWORD']);
        
        if (UserLogic::registerUser($userEmail, $userPassword)) {
            // If registering is success, redirect to sign in page
            $this->_redirect('/kanban/welcome/signin');
        } else {// If failure to sign up page again
            $errMsg = 'Failure: Maybe, this e-mail address is already registered';
            SessionData::putErrMsgInsession($errMsg);
            $this->_redirect('/kanban/welcome/signup');
        }
    }

    private function shouldRedirect(): bool
    {
        // If the user already signs in, we would not let them access to signin or signup page again.
        $user = SessionData::getUserInSession();
        $action = $this->getRequest()->getActionName();
        if (!is_null($user) && (strcmp($action, 'signin') == 0 || strcmp($action, 'signup') == 0)) {
            $shouldRedirect = true;
        } else {
            $shouldRedirect = false;
        }
        return $shouldRedirect;
    }
}
