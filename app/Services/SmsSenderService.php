<?php

namespace App\Services;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client as TwilioClient;

class SmsSenderService implements SmsSenderInterface
{
    protected TwilioClient $client;

    /**
     * @throws ConfigurationException
     */
    public function __construct($sid, $token)
    {
        $this->client = new TwilioClient($sid, $token);
    }

    /**
     * @throws TwilioException
     */
    public function send($message): void
    {
        $this->client->messages->create(
            7979879998989, [
                'from' => 3111546464,
                'body' => 'text sms message']
        );
    }
}
