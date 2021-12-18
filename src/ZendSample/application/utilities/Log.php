<?php

class Log
{
    private Zend_Log $logger;

    private function __construct()
    {
        $this->logger = new Zend_Log(
            new Zend_Log_Writer_Stream(LOG_PATH)
        );
        // Set log level filter
        $this->logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::INFO));
    }

    public static function getLogWriter(): Zend_Log
    {
        if (is_null($logger)) {
            return (new Log())->logger;
        } else {
            return $logger;
        }
    }

    public static function getMessage(?string $userId, string $content): string
    {
        $userPart = 'user_id=';
        if (is_null($user_id)) {
            $userPart = $userPart . 'unknown';
        } else {
            $userPart = $userPart . $userId;
        }
        return $userPart . ', ' . $content;
    }
}
