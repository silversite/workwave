<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\OrderInputCollection AS OrderInputCollection;

final class OrderRequest implements \JsonSerializable
{
    /**
     * @var OrderInputCollection
     */
    private $orders;

    /**
     * @var bool
     */
    private $strict = true;

    /**
     * @var bool
     */
    private $acceptBadGeoCodes = false;

    /**
     * Order constructor.
     * @param OrderInputCollection $orders
     * @param bool $strict
     * @param bool $acceptBadGeoCodes
     */
    public function __construct(OrderInputCollection $orders, bool $strict = true, bool $acceptBadGeoCodes = false)
    {
        $this->orders = $orders;
        $this->strict = $strict;
        $this->acceptBadGeoCodes = $acceptBadGeoCodes;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
