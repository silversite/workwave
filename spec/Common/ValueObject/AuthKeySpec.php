<?php
declare(strict_types=1);

namespace spec\SilverSite\WorkWave\Common\ValueObject;

use PhpSpec\ObjectBehavior;
use SilverSite\WorkWave\Common\Exceptions\InvalidUUIDException;
use SilverSite\WorkWave\Common\ValueObject\AuthKey;

class AuthKeySpec extends ObjectBehavior
{
    private const AUTH_UUID = '429defc8-5b05-4c3e-920d-0bb911a61345';

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AuthKey::class);
    }

    public function let(): void
    {
        $this->beConstructedWith(self::AUTH_UUID);
    }

    public function it_return_auth_key_in_string_format(): void
    {
        $this->shouldContainsGivenAuthKey();
    }

    public function it_throw_an_exception_when_uuid_has_invalid_format(): void
    {
        $this->uuidHasInvalidFormat();
    }

    private function shouldContainsGivenAuthKey(): void
    {
        $this->__toString()->shouldEqual(self::AUTH_UUID);
    }

    private function uuidHasInvalidFormat(): void
    {
        $this->beConstructedWith('invali-uuu-id');
        $this->shouldThrow(InvalidUUIDException::class)->duringInstantiation();
    }
}
