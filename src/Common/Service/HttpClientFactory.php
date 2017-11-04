<?php

namespace SilverSite\WorkWave\Common\Service;

use GuzzleHttp\Client;

final class HttpClientFactory implements HttpClientFactoryInterface
{
    private const API_URI = 'https://wwrm.workwave.com';

    /**
     * @var AuthenticationHeader
     */
    private $authHeader;

    /**
     * HttpClientFactory constructor.
     * @param \SilverSite\WorkWave\Common\Service\AuthenticationHeader $header
     */
    public function __construct(AuthenticationHeader $header)
    {
        $this->authHeader = $header;
    }

    /**
     * @return Client
     */
    public function create(): Client
    {
        $config = ['base_uri' => self::API_URI] + $this->authHeader->requestHeader();

        return new Client($config);
    }
}
