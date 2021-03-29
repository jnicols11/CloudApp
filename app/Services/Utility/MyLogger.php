<?php

namespace App\Services\Utility;

use Monolog\Logger;
use Monolog\Handler\LogglyHandler;

class MyLogger
{
    private static $logger = null;

    static function getLogger()
    {
        if (self::$logger == null) {
            self::$logger = new Logger('playLaravel');
            self::$logger->pushHandler(new LogglyHandler('15ab0471-439c-44bd-bb53-352c731962ce/tag/apache,production/', Logger::DEBUG));
        }
        return self::$logger;
    }

    public static function debug($message)
    {
        self::getLogger()->addDebug($message);
    }

    public static function info($message)
    {
        self::getLogger()->addInfo($message);
    }

    public static function warning($message)
    {
        self::getLogger()->addWarning($message);
    }

    public static function error($message)
    {
        self::getLogger()->addError($message);
    }
}
