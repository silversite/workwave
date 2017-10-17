<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\Collection\ComparableInterface;

final class Date implements ComparableInterface
{
    /**
     * @var \DateTime
     */
    private $date;

    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    public function __toString(): string
    {
        return $this->date->format('Ymd');
    }

    /**
     * @param Date $element
     * @return bool
     */
    public function isEqual($element): bool
    {
        if (!$element instanceof Date) {
            throw ComparableException::create();
        }

        return (strcmp((string)$this, (string)$element) == 0);
    }
}
