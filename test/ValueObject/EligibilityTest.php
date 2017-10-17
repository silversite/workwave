<?php

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\OnDateCollection;
use SilverSite\WorkWave\ValueObject\Date;
use SilverSite\WorkWave\ValueObject\Eligibility;
use PHPUnit\Framework\TestCase;

class EligibilityTest extends TestCase
{
    /**
     * @test
     */
    public function itGivenInvalidTypeThenException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The type argument has invalid value. Expected one of: "on, any"');
        new Eligibility('invalidType');
    }

    /**
     * @test
     */
    public function itGivenTypeOnAndDateCollectionThenConvertToJson()
    {
        $collection = new OnDateCollection();
        $collection->add(new Date(new \DateTime('2017-10-23')));
        $collection->add(new Date(new \DateTime('2017-10-24')));

        $object = new Eligibility('on', $collection);
        $this->assertEquals(
            '{"type":"on","onDates":["20171023","20171024"]}',
            json_encode($object)
        );
    }
}
