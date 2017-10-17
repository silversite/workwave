<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\ValueObject\OrderDeliveryStatus;
use SilverSite\WorkWave\ValueObject\OrderId;

final class OrderDeliveryStatusCollection extends CollectionAbstract
{
    /**
     * @throws ElementNotFoundException
     */
    public function current(): OrderDeliveryStatus
    {
        return $this->returnCurrent();
    }

    /**
     * @param OrderDeliveryStatus $element
     *
     * @throws ElementExistsException
     * @throws \Exception
     */
    public function add(OrderDeliveryStatus $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }

        $this->elements[] = $element;
    }

    /**
     * @throws \Exception
     */
    public function exists(OrderDeliveryStatus $element): bool
    {
        return $this->existsElement($element);
    }

    /**
     * @return OrderDeliveryStatus
     */
    public function first()
    {
        return parent::first();
    }

    public function findByOrderId(OrderId $orderId): ?OrderDeliveryStatus
    {
        /** @var $element OrderDeliveryStatus */
        foreach ($this->elements as $element) {
            if ((string) $element->orderId() !== (string) $orderId) {
                continue;
            }

            return $element;
        }

        return null;
    }

    /**
     * @throws ElementExistsException
     * @throws \Exception
     */
    public function toOrderId(): OrderIdCollection
    {
        $collection = new OrderIdCollection();

        /** @var $element OrderDeliveryStatus */
        foreach ($this->elements as $element) {
            $collection->add($element->orderId());
        }

        return $collection;
    }
}
