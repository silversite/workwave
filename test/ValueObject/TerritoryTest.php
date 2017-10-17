<?php

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Exceptions\InvalidUUIDException;
use PHPUnit\Framework\TestCase;

class TerritoryTest extends TestCase
{
    /**
     * @test
     */
    public function itValidUUID()
    {
        $id = '429defc8-5b05-4c3e-920d-0bb911a61345';
        $territory = new TerritoryId($id);
        $this->assertEquals($id, $territory);
    }

    /**
     * @test
     */
    public function itUUIDInvalidValueException()
    {
        $this->expectException(InvalidUUIDException::class);
        $id = '429defc8-5b05-4c3e-920d-0bb911a6';
        new TerritoryId($id);
    }
}
