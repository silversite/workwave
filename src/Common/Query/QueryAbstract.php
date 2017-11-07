<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Query;

use SilverSite\WorkWave\Common\Service\Client;

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

    /**
     * QueryAbstract constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $urlParams
     * @return array
     */
    protected function request(array $urlParams = []): array
    {
        $uri = $this->replaceParameters($urlParams);
        $response = $this->client->requestContent($uri, [], 'GET');

        return $response;
    }

    /**
     * @param array $parameters
     * @return string
     */
    protected function replaceParameters(array $parameters): string
    {
        return str_replace(array_keys($parameters), array_values($parameters), static::URI);
    }
}
