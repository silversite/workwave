<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\Common\ValueObject\ComparableInterface;

final class OrderResponse implements ComparableInterface
{
    /**
     * @var OrderId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Delivery
     */
    private $delivery;

    public function __construct(
        OrderId $id,
        string $name,
        Delivery $delivery
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->delivery = $delivery;
    }

    public function isEqual($element): bool
    {
        if ( !$element instanceof self) {
            throw ComparableException::create();
        }

        return $this->id === $element->id;
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function delivery(): Delivery
    {
        return $this->delivery;
    }
}
