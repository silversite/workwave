<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Common\Exceptions\Collection\ComparableException;
use SilverSite\WorkWave\Common\ValueObject\ComparableInterface;

final class TimeWindow implements ComparableInterface, \JsonSerializable
{
    /**
     * @var int
     */
    private $startSec;

    /**
     * @var int
     */
    private $endSec;

    public function __construct(int $startSec, int $endSec)
    {
        if ($startSec > $endSec) {
            throw new \InvalidArgumentException('Argument $endSec must be greater or equal then $startSec.');
        }
        $this->startSec = $startSec;
        $this->endSec = $endSec;
    }

    /**
     * @param TimeWindow $element
     * @return bool
     */
    public function isEqual($element): bool
    {
        if (! $element instanceof TimeWindow) {
            throw ComparableException::create();
        }

        return $element->jsonSerialize() === $this->jsonSerialize();
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
