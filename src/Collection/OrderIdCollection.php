<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\Common\Collection\AbstractCollection;
use SilverSite\WorkWave\ValueObject\OrderId;

final class OrderIdCollection extends AbstractCollection
{
    /**
     * @throws ElementNotFoundException
     */
    public function current(): OrderId
    {
        return $this->returnCurrent();
    }

    /**
     * @throws ElementExistsException
     * @throws \Exception
     */
    public function add(OrderId $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }

        $this->elements[] = $element;
    }

    /**
     * @throws \Exception
     */
    public function exists(OrderId $element): bool
    {
        return $this->existsElement($element);
    }

    public function __toString(): string
    {
        return implode(',', array_values($this->elements));
    }

    public function toArray(): array
    {
        $ids = [];

        /** @var OrderId $element */
        foreach ($this->elements as $element) {
            $ids[] = (string) $element;
        }

        return $ids;
    }
}
