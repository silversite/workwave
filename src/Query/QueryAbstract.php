<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Query;

use SilverSite\WorkWave\Service\Client;

abstract class QueryAbstract
{
    /**
     * @var string
     */
    protected const URI = '';

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function request(array $urlParams): array
    {
        $uri = $this->replaceParameters($urlParams);
        $response = $this->client->requestContent($uri, [], 'GET');

        return $response;
    }

    protected function replaceParameters(array $parameters): string
    {
        return str_replace(array_keys($parameters), array_values($parameters), static::URI);
    }
}
