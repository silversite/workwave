<?php

namespace SilverSite\WorkWave\Common\Service\Factory;

use GuzzleHttp\Client;
use SilverSite\WorkWave\Common\Service\AuthenticationHeader;

final class HttpClient implements HttpClientInterface
{
    private const API_URI = 'https://wwrm.workwave.com';

    /**
     * @var AuthenticationHeader
     */
    private $authHeader;

    public function __construct(AuthenticationHeader $header)
    {
        $this->authHeader = $header;
    }

    public function create(): Client
    {
        $config = ['base_uri' => self::API_URI] + $this->authHeader->requestHeader();

        return new Client($config);
    }
}
