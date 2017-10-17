<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\ValueObject\CaptureResponse;
use PHPUnit\Framework\TestCase;

class CaptureResponseTest extends TestCase
{

    private $jsonResponse = '{
  "requestId": "79f03f42-207f-471a-9b65-b849da0cd8de",
  "territoryId": "a1d0d875-5254-467a-a71d-3213ff9bb5f6",
  "event": "ordersChanged",
  "data": {
    "created": [
      {
        "id": "025d2014-6105-41c4-808a-21076f5a97f6",
        "geocodeStatus": {
          "delivery": "OK"
        }
      },
      {
        "id": "c2087e28-2065-488c-b432-3db6d30cad6f",
        "geocodeStatus": {
          "delivery": "OK"
        }
      }
    ],
    "updated": [],
    "deleted": []
  }
}
';


    /**
     * @test
     */
    public function itCollectDataFromRequest(): void
    {

        $object = new CaptureResponse(json_decode($this->jsonResponse, true));

        $this->assertEquals('79f03f42-207f-471a-9b65-b849da0cd8de', $object->requestId());
        $this->assertEquals('a1d0d875-5254-467a-a71d-3213ff9bb5f6', (string)$object->territoryId());

        $this->assertCount(2, $object->data()->created());
        $this->assertCount(0, $object->data()->updated());
        $this->assertCount(0, $object->data()->deleted());
    }
}
