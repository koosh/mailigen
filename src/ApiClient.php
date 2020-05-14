<?php

namespace Mailigen;

class ApiClient
{
    /**
     * @var \MGAPI
     */
    private $mgapi;

    public function __construct(string $apikey, $secure = false)
    {
        $this->mgapi = new \MGAPI($apikey, $secure);
    }

    public function __call($name, $arguments)
    {
        $result = call_user_func_array([$this->mgapi, $name], $arguments);
        if ($this->mgapi->errorCode) {
            throw new MailigenExcpeption($this->mgapi->errorMessage, $this->mgapi->errorCode);
        }

        return $result;
    }
}