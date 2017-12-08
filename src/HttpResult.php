<?php
/**
 * Created by IntelliJ IDEA.
 * User: icovn
 * Date: 08/12/2017
 * Time: 15:12
 */

namespace net\friend;


class HttpResult
{
    private $statusCode;
    private $body;

    function __construct($statusCode, $body){
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
}