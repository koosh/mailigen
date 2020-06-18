<?php

namespace Mailigen;

/**
 * @method listSubscribe($listId, string $email, array $array, string $string, bool $false, bool $false1, bool $true)
 * @method listUnsubscribe($listId, string $email, bool $true, bool $false, bool $false1)
 * @method campaignCreate(string $string, array $options, array $content)
 * @method campaignSendNow($newCampaign)
 *
 * There's more just @see \MGAPI, PR's to complete this list are very welcome.
 */
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
        try {
            $result = call_user_func_array([$this->mgapi, $name], $arguments);
        } catch (\Error $e) {
            throw new MailigenException($e->getMessage(), $e->getCode(), $e);
        }

        if ($this->mgapi->errorCode) {
            throw new MailigenException($this->mgapi->errorMessage, $this->mgapi->errorCode);
        }

        return $result;
    }
}