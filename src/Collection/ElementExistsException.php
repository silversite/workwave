<?php

namespace SilverSite\WorkWave\Collection;

class ElementExistsException extends \Exception
{
    public static function create(): self
    {
        return new self('Current element exists in collection');
    }
}
