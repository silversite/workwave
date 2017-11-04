<?php

declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use InvalidArgumentException;
use JsonSerializable;
use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\Common\ValueObject\ComparableInterface;

final class OrderDeliveryStatus implements JsonSerializable, ComparableInterface
{
    private const STATUS = [
        'OK', 'LOW_ACCURACY', 'POSTCODE_ISSUE', 'POSTCODE_LEVEL_ACCURACY',
        'OUT_OF_TERRITORY_RANGE', 'NOT_FOUND', 'GEOCODING_ERROR', 'GEOCODING_TIMEOUT',
    ];

    /**
     * @var string
     */
    private $deliveryStatus;

    /**
     * @var OrderId
     */
    private $orderId;

    public function __construct(OrderId $orderId, string $deliveryStatus)
    {
        if (! in_array($deliveryStatus, self::STATUS)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Given status code are invalid. Expected one of %s',
                    implode(',', self::STATUS)
                )
            );
        }
        $this->orderId = $orderId;
        $this->deliveryStatus = $deliveryStatus;
    }

    public function deliveryStatus(): string
    {
        return $this->deliveryStatus;
    }

    public function orderId(): OrderId
    {
        return $this->orderId;
    }

    public function jsonSerialize(): array
    {
        return [
            'delivery' => $this->deliveryStatus,
        ];
    }

    /**
     * @throws ComparableException
     */
    public function isEqual($element): bool
    {
        if (! $element instanceof self) {
            throw ComparableException::create();
        }

        return $this->orderId->isEqual($element->orderId);
    }
}
