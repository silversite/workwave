<?php

declare(strict_types=1);

namespace SilverSite\WorkWave\Infrastructure\Doctrine\Model\Entity;

interface OrderStatusInterface
{
    public function setExternalOrderUuid(string $orderId): void;

    public function setStatusType(string $status): void;

    public function setStatusDetails(?string $statusDetails): void;
}
