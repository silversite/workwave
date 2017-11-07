<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Service;

interface AuthenticationHeaderInterface
{
    /**
     * @return array
     */
    public function authKey(): array;
}
