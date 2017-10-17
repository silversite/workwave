<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\Collection\ComparableInterface;

final class OrderId extends Uuid implements ComparableInterface
{
    /**
     * @param OrderId $element
     * @return bool
     */
    public function isEqual($element): bool
    {
        if (!$element instanceof self) {
            throw ComparableException::create();
        }

        return $this->id === $element->id;
    }
}
