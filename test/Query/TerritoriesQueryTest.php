<?php

namespace SilverSiteTest\WorkWave\Endpoint;

use SilverSite\WorkWave\Query\Territories;
use SilverSiteTest\WorkWave\Query\QueryTestCase;
use SilverSiteTest\WorkWave\TestCase\Query;

class TerritoriesQueryTest extends Query
{
    protected $jsonResponse = '
        {
          "territories": {
            "429defc8-5b05-4c3e-920d-0bb911a61345": {
              "id": "429defc8-5b05-4c3e-920d-0bb911a61345",
              "name": "API DEMO",
              "center": [
                33831218,
                -87277506
              ],
              "timeZoneCode": "America/New_York",
              "languageCode": "en"
            }
          }
        }';

    /**
     * @test
     */
    public function itGivenListOfAllTerritories()
    {
        $this->mockRequestResponse($this->jsonResponse);
        $territories = new Territories($this->worWaveClientMock);
        $listOfAll = $territories->findAll();
        $this->assertEquals('429defc8-5b05-4c3e-920d-0bb911a61345', $listOfAll->current());
    }

    /**
     * @test
     */
    public function itReturnNullIfNonTerritories()
    {
        $this->mockRequestResponse('[]');
        $this->worWaveClientMock
            ->expects($this->once())
            ->method('requestContent')
            ->willReturn([]);

        $territories = new Territories($this->worWaveClientMock);
        $listOfAll = $territories->findAll();
        $this->assertNull($listOfAll);
    }
}
