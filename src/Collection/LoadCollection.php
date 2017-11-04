<?php

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\Common\Collection\AbstractCollection;
use SilverSite\WorkWave\ValueObject\Load;

final class LoadCollection extends AbstractCollection implements \JsonSerializable
{
    /**
     * @return Load
     * @throws ElementNotFoundException
     */
    public function current(): Load
    {
        return $this->returnCurrent();
    }

    /**
     * @param Load $element
     * @throws ElementExistsException | \Exception
     */
    public function add(Load $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }

        $this->elements[] = $element;
    }

    /**
     * @param Load $element
     * @return bool
     * @throws \Exception
     */
    public function exists(Load $element): bool
    {
        return $this->existsElement($element);
    }

    public function jsonSerialize(): array
    {
        $dates = [];

        /** @var $element Load */
        foreach ($this->elements as $element) {
            $dates = $dates + $element->jsonSerialize();
        }

        return $dates;
    }
}
