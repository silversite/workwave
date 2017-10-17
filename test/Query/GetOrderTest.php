<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\Query;

use SilverSite\WorkWave\Collection\OrderIdCollection;
use SilverSite\WorkWave\Query\GetOrder;
use SilverSite\WorkWave\ValueObject\OrderId;
use SilverSite\WorkWave\ValueObject\TerritoryId;
use SilverSiteTest\WorkWave\TestCase\Query;

class GetOrderTest extends Query
{
    protected $jsonResponse = '{
  "orders": {
    "4516b2e1-43dc-49a8-8bfb-7190fa60df21": {
      "id": "4516b2e1-43dc-49a8-8bfb-7190fa60df21",
      "name": "Order 1",
      "delivery": {
        "customFields": {
            "orderId": "abcd1234"
          }
      }
    },
    "0d56e7a3-c737-472e-bec9-e2f19d4865d3": {
      "id": "0d56e7a3-c737-472e-bec9-e2f19d4865d3",
      "name": "Order 2",
      "delivery": {
        "customFields": {
            "orderId": "abcd123"
        }
      }
    }
  }
}';

    /**
     * @test
     */
    public function itGivenOrdersIdThenOrdersDetails(): void
    {
        $this->mockRequestResponse($this->jsonResponse);
        $orders = new GetOrder($this->worWaveClientMock);

        $collection = new OrderIdCollection();
        $collection->add(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'));
        $collection->add(new OrderId('0d56e7a3-c737-472e-bec9-e2f19d4865d3'));

        $territoryId = new TerritoryId('429defc8-5b05-4c3e-920d-0bb911a61345');

        $ordersCollection = $orders->findByIds($territoryId, $collection);

        $this->assertEquals('4516b2e1-43dc-49a8-8bfb-7190fa60df21', $ordersCollection->first()->id());
        $this->assertEquals('Order 1', $ordersCollection->first()->name());
        $this->assertEquals('orderId', $ordersCollection->first()->delivery()->customFields()->current()->name());
        $this->assertEquals('abcd1234', $ordersCollection->first()->delivery()->customFields()->current()->value());

        $ordersCollection->next();
        $this->assertEquals('0d56e7a3-c737-472e-bec9-e2f19d4865d3', $ordersCollection->current()->id());
        $this->assertEquals('Order 2', $ordersCollection->current()->name());
        $this->assertEquals('orderId', $ordersCollection->current()->delivery()->customFields()->current()->name());
        $this->assertEquals('abcd123', $ordersCollection->current()->delivery()->customFields()->current()->value());
    }

    /**
     * @test
     */
    public function itGivenEmptyResponseThenReturnNull(): void
    {
        $this->mockRequestResponse('{"orders": {}}');
        $collection = new OrderIdCollection();
        $collection->add(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'));
        $collection->add(new OrderId('0d56e7a3-c737-472e-bec9-e2f19d4865d3'));

        $territoryId = new TerritoryId('429defc8-5b05-4c3e-920d-0bb911a61345');

        $orders = new GetOrder($this->worWaveClientMock);
        $ordersCollection = $orders->findByIds($territoryId, $collection);

        $this->assertNull($ordersCollection);
    }
}
