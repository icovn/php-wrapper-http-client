<?php
/**
 * Created by IntelliJ IDEA.
 * User: icovn
 * Date: 08/12/2017
 * Time: 14:48
 */

namespace net\friend;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LogManager
{
    public static function logInfo($message, $logger = ""){
        $logPath = ConfigManager::getConfig("LOG_PATH");

        // create a log channel
        $log = new Logger($logger);
        $log->pushHandler(new StreamHandler($logPath, Logger::INFO));

        // add records to the log
        $log->info($message);
    }

    public static function logError($message, $logger = ""){
        $logPath = ConfigManager::getConfig("LOG_ERROR_PATH");

        // create a log channel
        $log = new Logger($logger);
        $log->pushHandler(new StreamHandler($logPath, Logger::ERROR));

        // add records to the log
        $log->error($message);
    }
}