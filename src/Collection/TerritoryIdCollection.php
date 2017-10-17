<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Collection;

use SilverSite\WorkWave\ValueObject\TerritoryId as TerritoryIdVo;

final class TerritoryIdCollection extends CollectionAbstract
{
    /**
     * @param TerritoryIdVo $element
     * @throws ElementExistsException | \Exception
     */
    public function add(TerritoryIdVo $element): void
    {
        if ($this->exists($element)) {
            throw ElementExistsException::create();
        }
        $this->elements[] = $element;
    }

    /**
     * @param TerritoryIdVo $element
     * @return bool
     * @throws \Exception
     */
    public function exists(TerritoryIdVo $element): bool
    {
        return $this->existsElement($element);
    }

    /**
     * @return TerritoryIdVo
     * @throws ElementNotFoundException
     */
    public function current(): TerritoryIdVo
    {
        return $this->returnCurrent();
    }
}
