<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Service;

use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;
use SilverSite\WorkWave\Common\Service\Factory\HttpClient as HttpClientFactory;

final class Client
{
    public const REQUEST_METHOD_POST = 'POST';
    public const REQUEST_METHOD_GET = 'GET';
    public const REQUEST_METHOD_DELETE = 'DELETE';

    /**
     * @var HttpClient
     */
    private $httpClient;

    public function __construct(HttpClientFactory $factory)
    {
        $this->httpClient = $factory->create();
    }

    public function requestContent(string $uri, array $parameters = [], $method = self::REQUEST_METHOD_POST): array
    {
        $response = $this->request($uri, $parameters, $method);
        $content = $response->getBody()->getContents();

        return json_decode($content, true);
    }

    public function request(string $uri, array $parameters = [], $method = self::REQUEST_METHOD_POST): ResponseInterface
    {
        return $this->httpClient->request($method, 'api/v1/' . $uri, ['json' => $parameters]);
    }
}
