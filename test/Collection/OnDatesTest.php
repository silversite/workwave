<?php

namespace SilverSiteTest\WorkWave\Collection;

use SilverSite\WorkWave\Collection\OnDateCollection;
use SilverSite\WorkWave\ValueObject\Date;
use PHPUnit\Framework\TestCase;

class OnDatesTest extends TestCase
{
    /**
     * @test
     * @throws \Exception|\SilverSite\WorkWave\Collection\ElementExistsException
     */
    public function itConvertToJson()
    {
        $collection = new OnDateCollection();
        $collection->add(new Date(new \DateTime('2017-10-23')));
        $collection->add(new Date(new \DateTime('2017-10-24')));

        $this->assertEquals('["20171023","20171024"]', json_encode($collection));
    }
}
