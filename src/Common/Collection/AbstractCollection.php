<?php

namespace SilverSite\WorkWave\Common\Collection;

use SilverSite\WorkWave\Collection\ElementNotFoundException;
use SilverSite\WorkWave\Common\ValueObject\ComparableInterface;

abstract class AbstractCollection implements \Iterator, \Countable, CollectionInterface
{

    /** @var array */
    protected $elements = [];

    /** @var int */
    private $key = 0;

    public function next(): void
    {
        ++$this->key;
    }

    public function rewind(): void
    {
        $this->key = 0;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @return object | null
     */
    public function first()
    {
        if ($element = reset($this->elements)) {
            return $element;
        }

        return null;
    }

    public function last()
    {
        return end($this->elements);
    }

    public function remove(int $key)
    {
        if (!isset($this->elements[$key]) && !array_key_exists($key, $this->elements)) {
            return null;
        }

        $removed = $this->elements[$key];
        unset($this->elements[$key]);

        return $removed;
    }

    /**
     * @param object $element
     * @return bool
     */
    public function removeElement($element): bool
    {
        $key = array_search($element, $this->elements, true);

        if ($key === false) {
            return false;
        }

        unset($this->elements[$key]);

        return true;
    }

    /**
     * @return mixed
     * @throws ElementNotFoundException
     */
    protected function returnCurrent()
    {
        if (!$this->valid()) {
            throw ElementNotFoundException::create();

        }
        return $this->elements[$this->key()];
    }

    public function valid(): bool
    {
        return isset($this->elements[$this->key()]);
    }

    public function key(): int
    {
        return $this->key;
    }

    /**
     * @param object $element
     * @param bool $setKeyOnFind
     * @return bool
     * @throws \Exception
     */
    protected function existsElement($element, $setKeyOnFind = false): bool
    {
        foreach ($this->elements as $key => $baseElement) {
            if (!$baseElement instanceof ComparableInterface) {
                throw new \Exception(
                    'Element: ' . get_class($baseElement)
                    . ' does not implement interface ' . ComparableInterface::class
                );
            }

            if ($baseElement->isEqual($element)) {
                if ($setKeyOnFind) {
                    $this->key = $key;
                }

                return true;
            }
        }

        return false;
    }
}

