<?php

namespace SilverSite\WorkWave\CommandHandler;

use SilverSite\WorkWave\Service\Client;

abstract class AbstractCommandHandler
{
    protected const URI = '';

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function request(array $parameters, array $endPointParams = [], $method = Client::REQUEST_METHOD_POST): array
    {
        $uri = $this->replaceEndPointParams($endPointParams);

        return $this->client->requestContent($uri, $parameters, $method);
    }

    private function replaceEndPointParams(array $params): string
    {
        return str_replace(array_keys($params), array_values($params), static::URI);
    }
}
