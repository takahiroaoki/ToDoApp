<?php

class Log
{
    private ?Zend_Log $logger = null;

    public static function getLogWriter(): Zend_Log
    {
        if (is_null($logger)) {
            $logger = new Zend_Log(
                new Zend_Log_Writer_Stream($GLOBALS['LOG_PATH'])
            );
        }
        
        // Set log level filter
        $logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::INFO));

        return $logger;
    }

    public static function getMessage(?string $userId, string $content): string
    {
        $userPart = 'user_id=';
        if (is_null($userId)) {
            $userPart = $userPart . 'unknown';
        } else {
            $userPart = $userPart . $userId;
        }
        return $userPart . ', ' . $content;
    }
}
