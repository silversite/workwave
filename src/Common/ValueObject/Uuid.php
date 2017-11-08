<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\ValueObject;

use SilverSite\WorkWave\Common\Exceptions\InvalidUUIDException;

abstract class Uuid
{
    private const UUID_REGEX = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';

    /**
     * @var string
     */
    protected $uuid;

    /**
     * Uuid constructor.
     * @param string $uuid
     */
    public function __construct(string $uuid)
    {
        $this->validUuid($uuid);
        $this->uuid = $uuid;
    }

    /**
     * @param string $uuid
     */
    protected function validUuid(string $uuid): void
    {
        if ( !preg_match(self::UUID_REGEX, $uuid)) {
            throw InvalidUUIDException::create();
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->uuid;
    }
}
