<?php
declare(strict_types=1);

namespace spec\SilverSite\WorkWave\Common\Command;

use PhpSpec\ObjectBehavior;
use SilverSite\WorkWave\Common\Command\SetCallbackUrlCommand;
use SilverSite\WorkWave\Common\Exceptions\ValueEmptyException;

class SetCallbackUrlCommandSpec extends ObjectBehavior
{
    private const CALLBACK_URL = 'https://my.server.com/callback';

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SetCallbackUrlCommand::class);
    }

    public function let(): void
    {
        $this->beConstructedWith(self::CALLBACK_URL);
    }

    public function it_has_a_url(): void
    {
        $this->getUrl()->shouldEqual(self::CALLBACK_URL);
    }

    public function it_url_cannot_be_empty(): void
    {
        $this->beConstructedWith('');
        $this->shouldThrow(ValueEmptyException::class)->duringInstantiation();
    }
}
