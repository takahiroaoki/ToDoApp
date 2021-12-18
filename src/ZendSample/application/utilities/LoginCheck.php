<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/utilities/SessionNamespace.php';

class LoginCheck
{
    public static function getUserInSession(): ?User
    {
        $defaultNamespace = SessionNamespace::getInstance()->getNamespace(DEFAULT_NAMESPACE);
        $user = $defaultNamespace->user;
        if (!is_null($user)) {
            $user = User::cast(unserialize($user));
        } else {
            Zend_Session::destroy();
        }
        return $user;
    }
}
