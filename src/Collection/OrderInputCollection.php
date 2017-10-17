<?php

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\ValueObject\OrderInput;

final class OrderInputCollection extends CollectionAbstract implements \JsonSerializable
{

    /**
     * @return OrderInput
     * @throws ElementNotFoundException
     */
    public function current(): OrderInput
    {
        return $this->returnCurrent();
    }

    /**
     * @param OrderInput $element
     * @throws ElementExistsException | \Exception
     */
    public function add(OrderInput $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }
        $this->elements[] = $element;
    }

    /**
     * @param OrderInput $element
     * @return bool
     * @throws \Exception
     */
    public function exists(OrderInput $element): bool
    {
        return $this->existsElement($element);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $dates = [];
        /** @var $element OrderInput */
        foreach ($this->elements as $element) {
            $dates[] = $element->jsonSerialize();
        }

        return $dates;
    }
}
