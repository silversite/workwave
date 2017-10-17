<?php

namespace SilverSite\WorkWave\Query;

use SilverSite\WorkWave\Collection\TerritoryIdCollection as TerritoryIdCollection;

interface TerritoriesInterface
{
    public function findAll(): ?TerritoryIdCollection;
}
