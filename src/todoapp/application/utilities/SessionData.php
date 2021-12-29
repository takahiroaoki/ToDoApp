<?php

require_once APPLICATION_PATH . '/models/entities/User.php';
require_once APPLICATION_PATH . '/utilities/SessionNamespace.php';

class SessionData
{
    public static function getUserInSession(): ?User
    {
        $defaultNamespace = SessionNamespace::getInstance()->getNamespace($GLOBALS['DEFAULT_NAMESPACE']);
        $user = $defaultNamespace->user;
        if (!is_null($user)) {
            $user = User::cast(unserialize($user));
        }

        return $user;
    }

    public static function getUserIdInSession(): ?string
    {
        $user = self::getUserInSession();
        $userId = null;
        if (!is_null($user)) {
            $userId = $user->getUserId();
        }

        return $userId;
    }

    public static function putUserInSession(User $user): void
    {
        $defaultNamespace = SessionNamespace::getInstance()->getNamespace($GLOBALS['DEFAULT_NAMESPACE']);
        $defaultNamespace->user = serialize($user);
        
        return;
    }

    public static function getErrMsgInSession(): ?array
    {
        $defaultNamespace = SessionNamespace::getInstance()->getNamespace($GLOBALS['DEFAULT_NAMESPACE']);
        $errMsg = $defaultNamespace->errMsg;

        // Clear error messages in session
        $defaultNamespace->errMsg = array();
        
        return $errMsg;
    }

    public static function putErrMsgInSession(string $msg): void
    {
        $defaultNamespace = SessionNamespace::getInstance()->getNamespace($GLOBALS['DEFAULT_NAMESPACE']);
        $defaultNamespace->errMsg[] = $msg;

        return;
    }
}
