<?php

namespace SilverSiteTest\WorkWave\Service;

use GuzzleHttp\RequestOptions;
use SilverSite\WorkWave\Service\AuthenticationHeader;
use PHPUnit\Framework\TestCase;

class AuthenticationHeaderTest extends TestCase
{
    private $apiKey = '123e4567-e89b-12d3-a456-426655440000';

    /**
     * @test
     */
    public function itCreateAuthKeyHeader()
    {
        $authentication = new AuthenticationHeader($this->apiKey);
        $headers = $authentication->requestHeader()[RequestOptions::HEADERS];
        $this->assertArrayHasKey('X-WorkWave-Key', $headers);
        $this->assertEquals($this->apiKey, $headers['X-WorkWave-Key']);
    }
}
