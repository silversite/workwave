<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\ValueObject\ResponseData;
use PHPUnit\Framework\TestCase;

class ResponseDataTest extends TestCase
{
    private $dataJson = '{
    "data": {
    "created": [
    	{
        "id": "55295fc9-fa1f-4c20-9665-df74273725e9",
        "geocodeStatus": {
          "delivery": "OK"
        }
      }
    ],
    "updated": [
      {
        "id": "746ecff4-ab73-4cce-992c-cd85a5c3608a",
        "geocodeStatus": {
          "delivery": "OK"
        }
      }
    ],
    "deleted": [
      "e1667d4c-14f7-4d88-ac82-ccedaf137b09"
    ]
    }
  }';

    /**
     * @test
     */
    public function whenRequestIsCreatedOrUpdateThenOrderStatus(): void
    {
        $response = new ResponseData(json_decode($this->dataJson, true)['data']);
        $orderStatusCollection = $response->created();
        $this->assertCount(1, $orderStatusCollection);

        $orderStatusCollection = $response->updated();
        $this->assertCount(1, $orderStatusCollection);
    }

    /**
     * @test
     * @throws
     */
    public function whenRequestIsDeleteThenOrderId(): void
    {
        $response = new ResponseData(json_decode($this->dataJson, true)['data']);
        $orderStatusCollection = $response->deleted();
        $this->assertCount(1, $orderStatusCollection);
        $this->assertEquals('e1667d4c-14f7-4d88-ac82-ccedaf137b09', (string) $orderStatusCollection->current());
    }


}
