<?php

namespace SilverSiteTest\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\CustomFieldsCollection;
use SilverSite\WorkWave\Collection\LoadCollection;
use SilverSite\WorkWave\Collection\OnDateCollection;
use SilverSite\WorkWave\ValueObject\CustomField;
use SilverSite\WorkWave\ValueObject\Date;
use SilverSite\WorkWave\ValueObject\Eligibility;
use SilverSite\WorkWave\ValueObject\Load;
use SilverSite\WorkWave\ValueObject\Location;
use SilverSite\WorkWave\ValueObject\OrderInput;
use SilverSite\WorkWave\ValueObject\OrderStepInput;
use SilverSite\WorkWave\ValueObject\TimeWindow;
use SilverSite\WorkWave\Collection\TimeWindowCollection as TimeWindowCollection;
use PHPUnit\Framework\TestCase;

class OrderInputTest extends TestCase
{

    private function given(): OrderInput
    {
        //given
        $name = 'Added Order';
        $collection = new OnDateCollection();
        $collection->add(new Date(new \DateTime('2017-10-23')));
        $collection->add(new Date(new \DateTime('2017-10-24')));

        $eligibility = new Eligibility('on', $collection);

        $loads = new LoadCollection();
        $loads->add(new Load('number of bags', '1'));

        $location = new Location('3101-3199 Florida Ave, Jasper, AL 35501, USA');
        $timeWindows = new TimeWindowCollection();
        $timeWindows->add(new TimeWindow(3060, 4500));

        $customFields = new CustomFieldsCollection();
        $customFields->add(new CustomField('OrderNo', 'ZDD-2017'));
        $customFields->add(new CustomField('CustomerName', 'Mickey Donovan'));

        $orderSetupInput = new OrderStepInput($location, $timeWindows, 'some notes', $customFields);

        $orderInput = new OrderInput($name, $eligibility, $loads, $orderSetupInput);

        return $orderInput;
    }

    /**
     * @test
     */
    public function itConvertToJson()
    {
        $expected = <<<JSON
{"name":"Added Order","eligibility":{"type":"on","onDates":["20171023","20171024"]},"forceVehicleId":null,"priority":0,"loads":{"number of bags":"1"},"pickup":null,"delivery":{"depotId":null,"location":{"address":"3101-3199 Florida Ave, Jasper, AL 35501, USA"},"timeWindows":[{"startSec":3060,"endSec":4500}],"notes":"some notes","customFields":{"OrderNo":"ZDD-2017","CustomerName":"Mickey Donovan"}},"isService":true}
JSON;
        $this->assertEquals($expected, json_encode($this->given()));
    }

    /**
     * @test
     */
    public function itTwoElementAreEquals()
    {
        $elementOne = $this->given();
        $elementTwo = $this->given();
        $this->assertTrue($elementOne->isEqual($elementTwo));
    }
}
