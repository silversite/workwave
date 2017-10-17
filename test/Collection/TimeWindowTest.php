<?php

namespace SilverSiteTest\WorkWave\Collection;

use SilverSite\WorkWave\Collection\TimeWindowCollection as TimeWindowCollection;
use SilverSite\WorkWave\ValueObject\TimeWindow;
use PHPUnit\Framework\TestCase;

class TimeWindowTest extends TestCase
{
    /**
     * @test
     */
    public function itConvertToJson()
    {
        $collection = new TimeWindowCollection();
        $collection->add(new TimeWindow(3600, 4500));
        $this->assertEquals('[{"startSec":3600,"endSec":4500}]', json_encode($collection));
    }

    /**
     * @test
     */
    public function itGivenLimitOfElementsThenException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Collection cannot contain more than 4 TimeWindows.');
        $collection = new TimeWindowCollection();
        $collection->add(new TimeWindow(3600, 4500));
        $collection->add(new TimeWindow(3601, 4500));
        $collection->add(new TimeWindow(3602, 4500));
        $collection->add(new TimeWindow(3603, 4500));
        $collection->add(new TimeWindow(3604, 4500));
    }
}
