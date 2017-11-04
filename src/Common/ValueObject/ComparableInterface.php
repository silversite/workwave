<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\ValueObject;

/**
 * Interface ComparableInterface
 * @package SilverSite\WorkWave\Common\ValueObject
 */
interface ComparableInterface
{
    /**
     * @param object $element
     * @return bool
     */
    public function isEqual($element): bool;
}
