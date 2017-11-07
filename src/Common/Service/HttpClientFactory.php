<?php

namespace SilverSite\WorkWave\Common\Service;

use GuzzleHttp\Client;

final class HttpClientFactory implements HttpClientFactoryInterface
{
    private const API_URI = 'https://wwrm.workwave.com';

    /**
     * @var AuthenticationHeaderInterface
     */
    private $authHeader;

    /**
     * HttpClientFactory constructor.
     * @param AuthenticationHeaderInterface $header
     */
    public function __construct(AuthenticationHeaderInterface $header)
    {
        $this->authHeader = $header;
    }

    /**
     * @return Client
     */
    public function create(): Client
    {
        $config = ['base_uri' => self::API_URI] + $this->authHeader->authKey();

        return new Client($config);
    }
}
