<?php

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\ValueObject\CustomField;
use SilverSite\WorkWave\ValueObject\Load;

class CustomFieldsCollection extends CollectionAbstract implements \JsonSerializable
{
    /**
     * @return CustomField
     * @throws ElementNotFoundException
     */
    public function current(): CustomField
    {
        return $this->returnCurrent();
    }

    /**
     * @param CustomField $element
     * @throws ElementExistsException | \Exception
     */
    public function add(CustomField $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }

        $this->elements[] = $element;
    }

    /**
     * @param CustomField $element
     * @return bool
     * @throws \Exception
     */
    public function exists(CustomField $element): bool
    {
        return $this->existsElement($element);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $fields = [];
        /** @var $element Load */
        foreach ($this->elements as $element) {
            $fields = $fields + $element->jsonSerialize();
        }

        return $fields;
    }
}
