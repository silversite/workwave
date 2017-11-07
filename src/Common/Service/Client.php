<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Service;

use Psr\Http\Message\ResponseInterface;
use SilverSite\WorkWave\Common\Service\HttpClientFactory as HttpClientFactory;

class Client implements ClientInterface
{
    /**
     * @var HttpClientFactory
     */
    private $httpClient;

    /**
     * Client constructor.
     * @param HttpClientFactoryInterface $factory
     */
    public function __construct(HttpClientFactoryInterface $factory)
    {
        $this->httpClient = $factory->create();
    }

    /**
     * @param string $uri
     * @param array $parameters
     * @param string $method
     * @return array
     */
    public function requestContent(string $uri, array $parameters = [], $method = self::REQUEST_METHOD_POST): array
    {
        $response = $this->request($uri, $parameters, $method);
        $content = $response->getBody()->getContents();

        return json_decode($content, true);
    }

    /**
     * @param string $uri
     * @param array $parameters
     * @param string $method
     * @return ResponseInterface
     */
    public function request(string $uri, array $parameters = [], $method = self::REQUEST_METHOD_POST): ResponseInterface
    {
        return $this->httpClient->request($method, 'api/v1/' . $uri, ['json' => $parameters]);
    }
}
