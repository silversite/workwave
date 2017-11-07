<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Service;

use GuzzleHttp\RequestOptions;

class AuthenticationHeader
{
    /**
     * @var string
     */
    private $authKey;

    /**
     * AuthenticationHeader constructor.
     * @param string $authKey
     */
    public function __construct(string $authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * @return array
     */
    public function requestHeader(): array
    {
        return [
            RequestOptions::HEADERS => [
                'X-WorkWave-Key' => $this->authKey
            ]
        ];
    }
}
