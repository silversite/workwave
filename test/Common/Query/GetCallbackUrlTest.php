<?php
declare(strict_types=1);

namespace SilverSiteTest\WorWave\Common\Query;

use SilverSiteTest\WorkWave\TestCase\ApiResponse;

class GetCallbackUrlTest extends ApiResponse
{
    private const RESPONSE_FILE = FIXTURES_PATH_RESPONSE . '/Common/GetUrl.json';

    /**
     * @test
     */
    public function getCurrentCallbackUrl(): void
    {
        $this->requestMock(self::RESPONSE_FILE);

    }
}
