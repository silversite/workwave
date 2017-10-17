<?php

namespace SilverSite\WorkWave\ValueObject;

final class Location implements \JsonSerializable
{
    /**
     * @var string
     */
    private $address;

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
