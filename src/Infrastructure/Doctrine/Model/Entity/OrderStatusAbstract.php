<?php

declare(strict_types=1);

namespace SilverSite\WorkWave\Infrastructure\Doctrine\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class OrderStatusAbstract implements OrderStatusInterface
{
    /**
     * @var string
     * @ORM\Column(name="external_order_uuid", nullable=true, type="string", length=36)
     */
    protected $externalOrderUuid;

    /**
     * @var string
     * @ORM\Column(name="status_type", nullable=true, type="string", length=50)
     */
    protected $statusType;

    /**
     * @var string
     * @ORM\Column(name="status_details", nullable=true, type="text")
     */
    protected $statusDetails;

    public function getExternalOrderUuid(): ?string
    {
        return $this->externalOrderUuid;
    }

    public function setExternalOrderUuid(string $orderWorkWaveId): void
    {
        $this->externalOrderUuid = $orderWorkWaveId;
    }

    public function setStatusType(string $status): void
    {
        $this->statusType = $status;
    }

    public function setStatusDetails(?string $statusDetails): void
    {
        $this->statusDetails = $statusDetails;
    }
}
