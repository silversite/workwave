<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\OnDateCollection;

final class Eligibility implements \JsonSerializable
{
    private const TYPES = ['on', 'any'];

    /**
     * @var string
     */
    private $type;

    /**
     * @var OnDateCollection
     */
    private $onDates;

    public function __construct(string $type, OnDateCollection $onDates = null)
    {
        if (!in_array($type, self::TYPES)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The type argument has invalid value. Expected one of: "%s"',
                    implode(', ', self::TYPES)
                )
            );
        }

        $this->type = $type;

        switch ($type) {
            case 'on':
                $this->onDates = $onDates === null ? [] : $onDates;
                break;
        }
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
