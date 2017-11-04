<?php
declare(strict_types=1);

namespace SilverSiteTest\WorWave\Common\Query;

use Silversite\WorWave\Common\Query\GetCallbackUrl;
use SilverSiteTest\WorkWave\TestCase\ApiResponse;

class GetCallbackUrlTest extends ApiResponse
{
    /**
     * @var string
     */
    protected $responseFile = '/Common/GetUrl.json';

    /**
     * @test
     */
    public function it_given_an_current_callback_url(): void
    {
        $query = new GetCallbackUrl($this->getFakeResponse());

        $this->assertEquals('https://my.server.com/callback', $query->url());
    }
}
