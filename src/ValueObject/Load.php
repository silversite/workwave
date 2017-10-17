<?php

namespace SilverSite\WorkWave\ValueObject;

final class Load implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function jsonSerialize(): array
    {
        return [
            $this->name => $this->value
        ];
    }
}
