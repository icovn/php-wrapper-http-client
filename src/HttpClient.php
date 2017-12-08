<?php
/**
 * Created by IntelliJ IDEA.
 * User: icovn
 * Date: 08/12/2017
 * Time: 14:35
 */

namespace net\friend;

use GuzzleHttp\Client;

class HttpClient
{
    private $connectTimeout;
    private $readTimeout;

    function __construct(){
        $this->connectTimeout = ConfigManager::getConfig("HTTP_CONNECT_TIME_OUT");
        $this->readTimeout = ConfigManager::getConfig("HTTP_READ_TIME_OUT");
    }

    public function get($uri, $authUsername, $authPassword, $headers, $query){
        return $this->query($uri, $authUsername, $authPassword, $headers, $query, 'GET');
    }

    public function post($uri, $authUsername, $authPassword, $headers, $query){
        return $this->query($uri, $authUsername, $authPassword, $headers, $query, 'POST');
    }

    /**
     * @param $uri URI of the request
     * @param $authUsername Username in BASIC authentication
     * @param $authPassword Password in BASIC authentication
     * @param $headers Array of headers
     * @param $query Array of request params
     * @param $method HTTP method (GET, POST, HEAD, ...)
     * @return HttpResult|null
     */
    private function query($uri, $authUsername, $authPassword, $headers, $query, $method){
        try{
            $info = "[query]" . $uri . "|" . json_encode($query);
            LogManager::logInfo($info);
            $client = new Client();
            $res = $client->request($method, $uri, [
                'auth' => [$authUsername, $authPassword],
                'headers' => $headers,
                'query' => $query,
                'connect_timeout' => $this->connectTimeout,
                'timeout' => $this->readTimeout,
            ]);
            $result = new HttpResult($res->getStatusCode(), $res->getBody());
            print json_encode($result);
            return $result;
        }catch (\Exception $exception){
            $errorMessage = $info . $exception->getMessage();
            LogManager::logError($errorMessage, $exception->getFile());
            return null;
        }
    }
}