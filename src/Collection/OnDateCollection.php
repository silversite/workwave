<?php

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\Common\Collection\AbstractCollection;
use SilverSite\WorkWave\ValueObject\Date;

final class OnDateCollection extends AbstractCollection implements \JsonSerializable
{

    /**
     * @return Date
     * @throws ElementNotFoundException
     */
    public function current(): Date
    {
        return $this->returnCurrent();
    }

    /**
     * @param Date $element
     * @throws ElementExistsException | \Exception
     */
    public function add(Date $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }
        $this->elements[] = $element;
    }

    /**
     * @param Date $element
     * @return bool
     * @throws \Exception
     */
    public function exists(Date $element): bool
    {
        return $this->existsElement($element);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $dates = [];
        /** @var $element Date */
        foreach ($this->elements as $element) {
            $dates[] = (string)$element;
        }

        return $dates;
    }
}
