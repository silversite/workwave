<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\ValueObject\OrderResponse;

final class OrderResponseCollection extends CollectionAbstract
{

    /**
     * @return OrderResponse
     * @throws ElementNotFoundException
     */
    public function current(): OrderResponse
    {
        return $this->returnCurrent();
    }

    /**
     * @param OrderResponse $element
     * @throws ElementExistsException | \Exception
     */
    public function add(OrderResponse $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }
        $this->elements[] = $element;
    }

    /**
     * @param OrderResponse $element
     * @return bool
     * @throws \Exception
     */
    public function exists(OrderResponse $element): bool
    {
        return $this->existsElement($element);
    }
}
