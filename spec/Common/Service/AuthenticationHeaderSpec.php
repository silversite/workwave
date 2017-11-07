<?php
declare(strict_types=1);

namespace spec\SilverSite\WorkWave\Common\Service;

use GuzzleHttp\RequestOptions;
use PhpSpec\ObjectBehavior;
use SilverSite\WorkWave\Common\Service\AuthenticationHeader;
use SilverSite\WorkWave\Common\ValueObject\AuthKey;

class AuthenticationHeaderSpec extends ObjectBehavior
{
    private const AUTH_KEY_GIVEN = '429defc8-5b05-4c3e-920d-0bb911a61345';

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AuthenticationHeader::class);
    }

    public function let(): void
    {
        $this->beConstructedWith(new AuthKey(self::AUTH_KEY_GIVEN));
    }

    public function it_create_header_with_auth_key(): void
    {
        $this->shouldHaveValidHeader();
    }

    private function shouldHaveValidHeader(): void
    {
        $this->authKey()->shouldBeArray();
        $this->authKey()->shouldHaveKey(RequestOptions::HEADERS);
        $this
            ->authKey()[RequestOptions::HEADERS]
            ->shouldHaveKeyWithValue(AuthenticationHeader::WORK_WAVE_KEY_HEADER, self::AUTH_KEY_GIVEN);
    }
}
