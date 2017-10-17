<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ElementExistsException;
use SilverSite\WorkWave\Collection\OrderDeliveryStatusCollection;
use SilverSite\WorkWave\Collection\OrderIdCollection;

final class ResponseData
{
    /**
     * @var OrderDeliveryStatusCollection
     */
    private $created;

    /**
     * @var OrderDeliveryStatusCollection
     */
    private $updated;

    /**
     * @var OrderIdCollection
     */
    private $deleted;

    /**
     * ResponseData constructor.
     *
     * @param array $data
     *
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $this->created = $this->createOrderDeliveryStatus($data['created']);
        $this->updated = $this->createOrderDeliveryStatus($data['updated']);
        $this->deleted = $this->createDeletedOrderId($data['deleted']);
    }

    /**
     * @throws \Exception
     */
    private function createDeletedOrderId(array $ordersId): OrderIdCollection
    {
        $collection = new OrderIdCollection();
        foreach($ordersId as $orderId)
        {
            try {
                $collection->add(new OrderId($orderId));
            } catch (ElementExistsException $exception) {

            }
        }

        return $collection;

    }

    /**
     * @throws \Exception
     */
    private function createOrderDeliveryStatus(array $orders): OrderDeliveryStatusCollection
    {
        $collection = new OrderDeliveryStatusCollection();
        foreach ($orders as $order) {
            try {
                $orderId = new OrderId($order['id']);
                $collection->add(new OrderDeliveryStatus($orderId, $order['geocodeStatus']['delivery']));
            } catch (ElementExistsException $exception) {

            }
        }

        return $collection;
    }

    public function created(): OrderDeliveryStatusCollection
    {
        return $this->created;
    }

    public function updated(): OrderDeliveryStatusCollection
    {
        return $this->updated;
    }

    public function deleted(): OrderIdCollection
    {
        return $this->deleted;
    }
}
