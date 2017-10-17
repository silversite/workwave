<?php

namespace SilverSite\WorkWave\Service\Factory;

use GuzzleHttp\Client;

interface HttpClientInterface
{
    public function create(): Client;
}
