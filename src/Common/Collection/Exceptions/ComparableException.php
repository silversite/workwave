<?php

namespace SilverSite\WorkWave\Common\Exceptions\Collection;


class ComparableException extends \InvalidArgumentException
{
    public static function create(): self
    {
        return new self('Can not compare different elements.');
    }
}
