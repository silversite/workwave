<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\Common\ValueObject\ComparableInterface;

final class CustomField implements \JsonSerializable, ComparableInterface
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

    public function isEqual($element): bool
    {
        if (!$element instanceof CustomField) {
            throw ComparableException::create();
        }

        return $element->name == $this->name && $element->value == $this->value;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): array
    {
        return [
            $this->name => $this->value,
        ];
    }
}
