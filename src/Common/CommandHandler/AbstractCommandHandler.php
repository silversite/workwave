<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\CommandHandler;

use DomainException;
use SilverSite\WorkWave\Common\Service\Client;

abstract class AbstractCommandHandler
{
    /**
     * @var string
     */
    protected $endpointUri;

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
    protected function request(
        array $parameters,
        array $endPointParams = [],
        string $method = Client::REQUEST_METHOD_POST
    ): array {
        $uri = $this->replaceEndPointParams($endPointParams);

        return $this->client->requestContent($uri, $parameters, $method);
    }

    /**
     * @param array $params
     * @return string
     * @throws DomainException
     */
    private function replaceEndPointParams(array $params): string
    {
        if (empty($this->endpointUri)) {
            throw new DomainException('Request URI cannot be empty');
        }

        return str_replace(array_keys($params), array_values($params), $this->endpointUri);
    }
}
