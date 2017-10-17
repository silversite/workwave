<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Command;

use SilverSite\WorkWave\ValueObject\OrderId;
use SilverSite\WorkWave\ValueObject\TerritoryId;

final class OrderDeleteCommand
{
    /**
     * @var OrderId
     */
    private $orderId;

    /**
     * @var TerritoryId
     */
    private $territoryId;

    public function __construct(OrderId $order, TerritoryId $territoryId)
    {
        $this->orderId = $order;
        $this->territoryId = $territoryId;
    }

    public function getOrderId(): OrderId
    {
        return $this->orderId;
    }

    public function getTerritoryId(): TerritoryId
    {
        return $this->territoryId;
    }
}
