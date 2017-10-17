<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Exceptions\InvalidUUIDException;

abstract class Uuid
{
    private const UUID_REGEX = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
    /**
     * @var string
     */
    protected $id;

    public function __construct(string $id)
    {
        $this->validUuid($id);
        $this->id = $id;
    }

    protected function validUuid(string $id): void
    {
        if (!preg_match(self::UUID_REGEX, $id)) {
            throw InvalidUUIDException::create();
        }
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
