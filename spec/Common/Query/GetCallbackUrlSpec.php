<?php
declare(strict_types=1);

namespace spec\SilverSite\WorkWave\Common\Query;

use PhpSpec\ObjectBehavior;
use SilverSite\WorkWave\Common\Query\GetCallbackUrl;
use SilverSite\WorkWave\Common\Service\Client;
use SilverSite\WorkWave\Common\Service\ClientInterface;
use SilverSite\WorkWave\Common\ValueObject\CallbackUrl;

class GetCallbackUrlSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(GetCallbackUrl::class);
    }

    public function let(Client $client): void
    {
        $content = file_get_contents( FIXTURES_PATH_RESPONSE . '/common/GetCallbackUrl.json');
        $client
            ->requestContent('callback', [], ClientInterface::REQUEST_METHOD_GET)
            ->willReturn(json_decode($content, true));

        $this->beConstructedWith($client);
    }

    public function it_make_request_and_get_callback_url(): void
    {
         $this->url()->shouldHaveType(CallbackUrl::class);
         $this->url()->__toString()->shouldBeEqualTo('https://my.server.com/callback');
    }
}
