<?php

namespace SilverSite\WorkWave\Collection;

class ElementNotFoundException extends \Exception
{
    public static function create(): self
    {
        return new self('Current element not fount in collection');
    }
}
