<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\TestCase;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

abstract class ApiResponse extends TestCase
{
    /**
     * @param string $responseFile
     * @return string
     */
    protected function requestMock(string $responseFile): string
    {
        $response = new Response(200, [], file_get_contents($responseFile));

        $mock = new MockHandler([$response]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        return $client->request('GET', '/')->getBody()->getContents();
    }
}