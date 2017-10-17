<?php

namespace SilverSiteTest\WorkWave\TestCase;

use SilverSite\WorkWave\Service\Client;
use PHPUnit\Framework\TestCase;

abstract class Query extends TestCase
{
    protected $jsonResponse;

    /**
     * @var $httpClient Client | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $worWaveClientMock;

    protected function setUp()
    {
        parent::setUp();

        $this->worWaveClientMock = $this->createMock(Client::class);
    }

    protected function mockRequestResponse(string $jsonResponse, int $expectsAt = 0)
    {
        $this->worWaveClientMock
            ->expects($this->at($expectsAt))
            ->method('requestContent')
            ->willReturn(
                json_decode(
                    $jsonResponse,
                    true
                )
            );
    }
}
