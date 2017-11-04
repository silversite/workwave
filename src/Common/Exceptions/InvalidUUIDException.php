<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Exceptions;

/**
 * Class InvalidUUIDException
 * @package SilverSite\WorkWave\Common\Exceptions
 */
class InvalidUUIDException extends \InvalidArgumentException
{
    /**
     * @return InvalidUUIDException
     */
    public static function create(): self
    {
        return new self('Given UUID has an invalid format.');
    }
}
