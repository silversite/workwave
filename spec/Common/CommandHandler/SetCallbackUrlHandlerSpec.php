<?php
declare(strict_types=1);

namespace spec\SilverSite\WorkWave\Common\CommandHandler;

use League\Tactician\Setup\QuickStart;
use PhpSpec\ObjectBehavior;
use SilverSite\WorkWave\Common\Command\SetCallbackUrlCommand;
use SilverSite\WorkWave\Common\CommandHandler\SetCallbackUrlHandler;
use SilverSite\WorkWave\Common\Service\Client;

class SetCallbackUrlHandlerSpec extends ObjectBehavior
{
    private const CALLBACK_URL = 'https://my.server.com/new-callback';

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SetCallbackUrlHandler::class);
    }

    public function let(Client $client): void
    {
        $response = [
            'url'         => self::CALLBACK_URL,
            'previousUrl' => 'https://my.server.com/callback',
        ];

        $this->it_mockClientResponse($client, $response);

        $this->beConstructedWith($client);
    }

    public function it_save_callback_url(Client $client): void
    {
        $this->it_handlerShouldBeCalled($client);
    }

    public function it_invalid_response(Client $client): void
    {
        $response = [
            'previousUrl' => self::CALLBACK_URL,
            'url'         => 'https://my.server.com/invaid_url',
        ];

        $this->it_mockClientResponse($client, $response);
        $this->beConstructedWith($client);

        $this->handleCommand();

        $this->shouldThrow(\DomainException::class)->during('handle');
    }

    private function it_mockClientResponse(Client $client, array $response): void
    {
        $client
            ->requestContent('callback', ['url' => self::CALLBACK_URL], Client::REQUEST_METHOD_POST)
            ->willReturn($response);
    }

    private function it_handlerShouldBeCalled(Client $client): void
    {
        $this->handleCommand();

        $client
            ->requestContent('callback', ['url' => self::CALLBACK_URL], Client::REQUEST_METHOD_POST)
            ->shouldHaveBeenCalled();
    }

    private function handleCommand(): void
    {
        $command = new SetCallbackUrlCommand(self::CALLBACK_URL);

        $commandBus = QuickStart::create(
            [
                SetCallbackUrlCommand::class => $this->getWrappedObject(),
            ]
        );

        $commandBus->handle($command);
    }
}
