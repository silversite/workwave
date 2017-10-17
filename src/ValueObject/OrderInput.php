<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\Collection\ComparableInterface;
use SilverSite\WorkWave\Collection\LoadCollection;

final class OrderInput implements \JsonSerializable, ComparableInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Eligibility
     */
    private $eligibility;

    /**
     * UUID OR null
     * @var string | null
     */
    private $forceVehicleId = null;

    /**
     * @var int
     */
    private $priority = 0;

    /**
     * @var LoadCollection
     */
    private $loads;

    /**
     * @var null
     */
    private $pickup = null;

    /**
     * @var OrderStepInput
     */
    private $delivery;

    /**
     * @var bool
     */
    private $isService = true;

    public function __construct(
        string $name,
        Eligibility $eligibility,
        LoadCollection $loads,
        OrderStepInput $delivery
    )
    {
        $this->name = $name;
        $this->eligibility = $eligibility;
        $this->loads = $loads;
        $this->delivery = $delivery;
    }

    public function isEqual($element): bool
    {
        if (!$element instanceof OrderInput) {
            throw ComparableException::create();
        }

        return $element->jsonSerialize() == $this->jsonSerialize();
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
