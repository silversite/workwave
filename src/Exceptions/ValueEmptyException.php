<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Exceptions;

class ValueEmptyException extends \InvalidArgumentException
{
    public static function create(string $name): self
    {
        return new self(sprintf('Value of "%s" can not be empty.', $name));
    }
}
