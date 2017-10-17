<?php

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\CustomFieldsCollection;
use SilverSite\WorkWave\ValueObject\CustomField;
use SilverSite\WorkWave\ValueObject\Location;
use SilverSite\WorkWave\ValueObject\OrderStepInput;
use SilverSite\WorkWave\ValueObject\TimeWindow;
use SilverSite\WorkWave\Collection\TimeWindowCollection as TimeWindowCollection;
use PHPUnit\Framework\TestCase;

class OrderStepInputTest extends TestCase
{
    private function given(): OrderStepInput
    {
        $location = new Location('3101-3199 Florida Ave, Jasper, AL 35501, USA');
        $timeWindows = new TimeWindowCollection();
        $timeWindows->add(new TimeWindow(3060, 4500));

        $customFields = new CustomFieldsCollection();
        $customFields->add(new CustomField('OrderNo', 'ZDD-2017'));

        $orderSetupInput = new OrderStepInput($location, $timeWindows, 'some notes', $customFields);

        return $orderSetupInput;
    }

    /**
     * @test
     */
    public function itConvertToJson()
    {
        $expected = <<<JSON
{"depotId":null,"location":{"address":"3101-3199 Florida Ave, Jasper, AL 35501, USA"},"timeWindows":[{"startSec":3060,"endSec":4500}],"notes":"some notes","customFields":{"OrderNo":"ZDD-2017"}}
JSON;
        $this->assertEquals($expected, json_encode($this->given()));
    }
}
