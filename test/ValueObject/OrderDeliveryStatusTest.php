<?php
declare(strict_types=1);

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\ValueObject\OrderDeliveryStatus;
use SilverSite\WorkWave\ValueObject\OrderId;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class OrderDeliveryStatusTest extends TestCase
{

    /**
     * @test
     */
    public function statusesSerializedToJson(): void
    {
        $status = new OrderDeliveryStatus(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'), 'OK');
        $this->assertEquals('{"delivery":"OK"}', json_encode($status));
        $this->assertEquals('4516b2e1-43dc-49a8-8bfb-7190fa60df21', $status->orderId());
    }

    /**
     * @test
     */
    public function whenGivenInvalidStatusCodeThenException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new OrderDeliveryStatus(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'), 'non_exist_code');
    }

    /**
     * @test
     */
    public function whenCompareAndGivenAnDifferentObjectThenException(): void
    {
        $this->expectException(ComparableException::class);
        $element = new OrderDeliveryStatus(new OrderId('4516b2e1-43dc-49a8-8bfb-7190fa60df21'), 'OK');
        $element->isEqual(new \DateTime());
    }
}
