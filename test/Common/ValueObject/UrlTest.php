<?php
declare(strict_types=1);

namespace SilverSiteTest\WorWave\Common\ValueObject;

use PHPUnit\Framework\TestCase;
use SilverSite\WorWave\Common\ValueObject\Url;
use Silversite\WorWave\Exceptions\ValueEmptyException;

class UrlTest extends TestCase
{
    /**
     * @test
     */
    public function when_url_is_empty_then_exception(): void
    {
        $this->expectException(ValueEmptyException::class);
        new Url('');
    }
}
