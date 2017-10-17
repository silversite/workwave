<?php

namespace SilverSite\WorkWave\Exceptions;

class InvalidUUIDException extends \InvalidArgumentException
{
    public static function create(): self
    {
        return new self('Given UUID has an invalid format.');
    }
}
