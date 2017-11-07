<?php
declare(strict_types=1);

namespace spec\SilverSite\WorkWave\Common\Service;

use GuzzleHttp\Client as HttpClient;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SilverSite\WorkWave\Common\Service\Client;
use SilverSite\WorkWave\Common\Service\ClientInterface;
use SilverSite\WorkWave\Common\Service\HttpClientFactoryInterface;

class ClientSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Client::class);
    }

    public function let(HttpClientFactoryInterface $clientFactory, HttpClient $httpClient, ResponseInterface $response, StreamInterface $stream): void
    {
        $stream->getContents()->willReturn(json_encode(['test' => 'test']));
        $response->getBody()->willReturn($stream);

        $httpClient
            ->request(ClientInterface::REQUEST_METHOD_GET, 'api/v1/test', ['json' => ['test' => 'test']])
            ->willReturn($response);

        $clientFactory->create()->willReturn($httpClient);
        $this->beConstructedWith($clientFactory);
    }

    public function it_request_to_url_then_return_response_body_and_content(): void
    {
        $this
            ->request('test', ['test' => 'test'], ClientInterface::REQUEST_METHOD_GET)
            ->shouldBeAnInstanceOf(ResponseInterface::class)
        ;
        $this
            ->request('test', ['test' => 'test'], ClientInterface::REQUEST_METHOD_GET)
            ->getBody()->shouldBeAnInstanceOf(StreamInterface::class)
        ;
        $this
            ->request('test', ['test' => 'test'], ClientInterface::REQUEST_METHOD_GET)
            ->getBody()
            ->getContents()->shouldEqual(json_encode(['test' => 'test']));
        ;
    }

    public function it_request_to_url_then_response_with_content(): void
    {
        $this
            ->requestContent('test', ['test' => 'test'], ClientInterface::REQUEST_METHOD_GET)
            ->shouldEqual(['test' => 'test']);
        ;
    }
}
