<?php

namespace SilverSite\WorkWave\Collection;

interface ComparableInterface
{
    /**
     * @param object $element
     * @return bool
     */
    public function isEqual($element): bool;
}
