<?php
/**
 * Created by IntelliJ IDEA.
 * User: icovn
 * Date: 08/12/2017
 * Time: 14:41
 */

namespace net\friend;

use Dotenv\Dotenv;

class ConfigManager
{
    public static function getConfig($key) {
        $dotenv = new Dotenv(__DIR__ . "/../");
        $dotenv->overload();
        return getenv($key);
    }
}