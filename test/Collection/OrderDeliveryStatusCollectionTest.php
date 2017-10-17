<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\Collection;

use PHPUnit\Framework\TestCase;
use SilverSite\WorkWave\Collection\OrderDeliveryStatusCollection;
use SilverSite\WorkWave\ValueObject\OrderDeliveryStatus;
use SilverSite\WorkWave\ValueObject\OrderId;

class OrderDeliveryStatusCollectionTest extends TestCase
{

    /**
     * @test
     * @throws
     */
    public function findElementInCollectionByOrderId(): void
    {
        $collection = new OrderDeliveryStatusCollection();
        $collection->add(new OrderDeliveryStatus(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'), 'OK'));
        $collection->add(new OrderDeliveryStatus(new OrderId('025d2014-6105-41c4-808a-21076f5a97f6'), 'OK'));

        $orderStatus = $collection->findByOrderId(new OrderId('025d2014-6105-41c4-808a-21076f5a97f6'));
        $this->assertEquals('OK', $orderStatus->deliveryStatus());

        $orderStatus = $collection->findByOrderId(new OrderId('025d2014-6105-41c4-808a-000000000000'));
        $this->assertNull($orderStatus);
    }

    /**
     * @test
     * @throws \Exception
     * @throws \SilverSite\WorkWave\Collection\ElementExistsException
     */
    public function toToOrderIdCollection(): void
    {
        $collection = new OrderDeliveryStatusCollection();
        $collection->add(new OrderDeliveryStatus(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'), 'OK'));
        $collection->add(new OrderDeliveryStatus(new OrderId('025d2014-6105-41c4-808a-21076f5a97f6'), 'OK'));

        $orderId = $collection->toOrderId();
        $this->assertCount(2, $orderId);
        $this->assertEquals('4516b2e1-43dc-49a8-8bfb-7190fa60df21', $orderId->current());
    }
}
