<?php

declare(strict_types=1);

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\Common\Collection\AbstractCollection;
use SilverSite\WorkWave\ValueObject\TimeWindow;

final class TimeWindowCollection extends AbstractCollection implements \JsonSerializable
{
    private const LIMIT = 4;

    /**
     * @return TimeWindow
     * @throws ElementNotFoundException
     */
    public function current(): TimeWindow
    {
        return $this->returnCurrent();
    }

    /**
     * @param TimeWindow $element
     * @throws ElementExistsException | \Exception
     */
    public function add(TimeWindow $element): void
    {
        if ($this->count() >= self::LIMIT) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Collection cannot contain more than %d TimeWindows.',
                    self::LIMIT
                )
            );
        }

        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }

        $this->elements[] = $element;
    }

    /**
     * @param TimeWindow $element
     * @return bool
     * @throws \Exception
     */
    public function exists(TimeWindow $element): bool
    {
        return $this->existsElement($element);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $elements = [];

        /** @var $element TimeWindow */
        foreach ($this->elements as $element) {
            $elements[] = $element->jsonSerialize();
        }

        return $elements;
    }
}
