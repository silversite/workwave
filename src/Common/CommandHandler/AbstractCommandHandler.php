<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\CommandHandler;

use SilverSite\WorkWave\Common\Service\Client;

abstract class AbstractCommandHandler
{
    protected const URI = '';

    /**
     * @var Client
     */
    private $client;

    /**
     * AbstractCommandHandler constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
     * @param array $endPointParams
     * @param string $method
     * @return array
     */
    protected function request(array $parameters, array $endPointParams = [], $method = Client::REQUEST_METHOD_POST): array
    {
        $uri = $this->replaceEndPointParams($endPointParams);

        return $this->client->requestContent($uri, $parameters, $method);
    }

    /**
     * @param array $params
     * @return string
     */
    private function replaceEndPointParams(array $params): string
    {
        return str_replace(array_keys($params), array_values($params), static::URI);
    }
}
