<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\ValueObject;

final class AuthKey extends Uuid
{
    /**
     * AuthKey constructor.
     * @param string $authKey
     */
    public function __construct(string $authKey)
    {
        $this->validUuid($authKey);
        parent::__construct($authKey);
    }
}
