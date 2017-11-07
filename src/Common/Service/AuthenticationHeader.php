<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Service;

use GuzzleHttp\RequestOptions;
use SilverSite\WorkWave\Common\ValueObject\AuthKey;

final class AuthenticationHeader implements AuthenticationHeaderInterface
{
    public const WORK_WAVE_KEY_HEADER = 'X-WorkWave-Key';

    /**
     * @var AuthKey
     */
    private $authKey;

    /**
     * AuthenticationHeader constructor.
     * @param AuthKey $authKey
     */
    public function __construct(AuthKey $authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * @return array
     */
    public function authKey(): array
    {
        return [
            RequestOptions::HEADERS => [
                self::WORK_WAVE_KEY_HEADER => (string)$this->authKey,
            ],
        ];
    }
}
