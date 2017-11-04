<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Service;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    public const REQUEST_METHOD_POST = 'POST';
    public const REQUEST_METHOD_GET = 'GET';
    public const REQUEST_METHOD_DELETE = 'DELETE';

    /**
     * @param string $uri
     * @param array $parameters
     * @param string $method
     * @return array
     */
    public function requestContent(string $uri, array $parameters = [], $method = self::REQUEST_METHOD_POST): array;

    /**
     * @param string $uri
     * @param array $parameters
     * @param string $method
     * @return ResponseInterface
     */
    public function request(string $uri, array $parameters = [], $method = self::REQUEST_METHOD_POST): ResponseInterface;
}