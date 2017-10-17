<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\CustomFieldsCollection;
use SilverSite\WorkWave\Collection\TimeWindowCollection As TimeWindowCollection;

final class OrderStepInput implements \JsonSerializable
{
    /**
     * @var string | null
     */
    private $depotId = null;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var TimeWindowCollection
     */
    private $timeWindows;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var CustomFieldsCollection
     */
    private $customFields = [];

    public function __construct(
        Location $location,
        TimeWindowCollection $timeWindows,
        string $notes = '',
        CustomFieldsCollection $customFields = null
    ) {
        $this->location = $location;
        $this->timeWindows = $timeWindows;
        $this->notes = $notes;
        $this->customFields = $customFields;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
