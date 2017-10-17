<?php

namespace SilverSite\WorkWave\Collection;


class ComparableException extends \InvalidArgumentException
{
    public static function create(): self
    {
        return new self('Can not compare different elements.');
    }
}
