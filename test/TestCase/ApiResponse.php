<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\TestCase;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use SilverSite\WorkWave\Common\Service\Client;
use SilverSite\WorkWave\Common\Service\HttpClientFactoryInterface;

abstract class ApiResponse extends TestCase
{
    /**
     * @var string
     */
    protected $responseFile;

    /**
     *
     * @return HttpClient
     */
    private function httpClientMock(): HttpClient
    {
        $contentFile = file_get_contents(FIXTURES_PATH_RESPONSE . $this->responseFile);
        $response = new Response(200, [], $contentFile);

        $mock = new MockHandler([$response]);

        $handler = HandlerStack::create($mock);
        $client = new HttpClient(['handler' => $handler]);

        return $client;
    }

    /**
     * @return Client
     */
    protected function getFakeResponse(): Client
    {
        /** @var HttpClientFactoryInterface | \PHPUnit_Framework_MockObject_MockObject $factory */
        $factory = $this->createMock(HttpClientFactoryInterface::class);
        $factory
            ->method('create')
            ->willReturn($this->httpClientMock());

        $client = new Client($factory);

        return $client;
    }
}