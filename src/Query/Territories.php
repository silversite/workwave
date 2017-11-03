<?php

namespace SilverSite\WorkWave\Query;

use SilverSite\WorkWave\Collection\ElementExistsException;
use SilverSite\WorkWave\Collection\TerritoryIdCollection as TerritoryIdCollection;
use SilverSite\WorkWave\Common\Query\QueryAbstract;
use SilverSite\WorkWave\ValueObject\TerritoryId;

class Territories extends QueryAbstract implements TerritoriesInterface
{
    protected const URI = 'territories';

    public function findAll(): ?TerritoryIdCollection
    {
        $territories = $this->client->requestContent(self::URI, [], 'GET');

        if (!isset($territories['territories'])) {
            return null;
        }

        $collection = new TerritoryIdCollection();
        try {
            foreach ($territories['territories'] as $territoryId => $territory) {
                $collection->add(new TerritoryId($territoryId));
            }
        } catch (ElementExistsException $exception) {
        };

        return $collection;
    }
}
