<?php

namespace SilverSite\WorkWave\Common\Service\Factory;

use GuzzleHttp\Client;

/**
 * Interface HttpClientInterface
 * @package SilverSite\WorkWave\Common\Service\Factory
 */
interface HttpClientInterface
{
    /**
     * @return Client
     */
    public function create(): Client;
}
