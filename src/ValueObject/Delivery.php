<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\CustomFieldsCollection;

final class Delivery
{
    /**
     * @var CustomFieldsCollection
     */
    private $customFields;

    public function __construct(CustomFieldsCollection $customFields)
    {
        $this->customFields = $customFields;
    }

    public function customFields(): CustomFieldsCollection
    {
        return $this->customFields;
    }
}
