<?php

namespace SilverSite\WorkWave\Common\Service;

use GuzzleHttp\Client;

/**
 * Interface HttpClientInterface
 * @package SilverSite\WorkWave\Common\Service\Factory
 */
interface HttpClientFactoryInterface
{
    /**
     * @return Client
     */
    public function create(): Client;
}
