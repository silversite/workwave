<?php

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ComparableException;
use SilverSite\WorkWave\ValueObject\TimeWindow;
use PHPUnit\Framework\TestCase;

class TimeWindowTest extends TestCase
{

    /**
     * @test
     */
    public function itGivenDifferentElementThenException()
    {
        $this->expectException(ComparableException::class);
        $timeWindow = new TimeWindow(1, 1);
        $timeWindow->isEqual(new \DateTime());
    }

    /**
     * @test
     */
    public function itSecStartIsEqualToEnd()
    {
        $timeWindow = new TimeWindow(3600, 3600);
        $this->assertEquals('{"startSec":3600,"endSec":3600}', json_encode($timeWindow));
    }

    /**
     * @test
     */
    public function itSecStartIsGraterThenEndThenException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Argument $endSec must be greater or equal then $startSec.');
        new TimeWindow(3600, 3500);
    }

    /**
     * @test
     */
    public function itSecStartIsLessThenEnd()
    {
        $timeWindow = new TimeWindow(3600, 3900);
        $this->assertEquals('{"startSec":3600,"endSec":3900}', json_encode($timeWindow));
    }
}
