<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Command;

use EarlyBird\OrderBundle\Entity\Order as OrderEntity;
use SilverSite\WorkWave\ValueObject\OrderRequest;
use SilverSite\WorkWave\ValueObject\TerritoryId;

final class OrderAddCommand
{
    /**
     * @var OrderRequest
     */
    private $order;

    /**
     * @var TerritoryId
     */
    private $territoryId;

    /**
     * @var OrderEntity
     */
    private $entity;

    public function __construct(OrderRequest $order, TerritoryId $territoryId, OrderEntity $entity)
    {
        $this->order = $order;
        $this->territoryId = $territoryId;
        $this->entity = $entity;
    }

    public function getOrder(): OrderRequest
    {
        return $this->order;
    }

    public function getTerritoryId(): TerritoryId
    {
        return $this->territoryId;
    }

    public function getOrderEntity(): OrderEntity
    {
        return $this->entity;
    }
}
