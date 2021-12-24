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
}
