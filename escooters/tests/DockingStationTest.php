<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\DockingStation;
use App\EScooter;

class DockingStationTest extends TestCase
{
    //As a person,
    //So that I can ride an escooter,
    //I need a docking station to release a escooter.
    public function testCanReleaseEScooter()
    {
        $station = new DockingStation();
        $escooter = $station->releaseEScooter();
        $this->assertInstanceOf(EScooter::class, $escooter);
    }

    //As a person,
    //So that I can ride a escooter safely,
    //I need to know if the escooter I'm interested in is working
    public function testEScooterIsWorking()
    {
       $escooter = new EScooter();
       $isWorking = $escooter->isWorking();
       $this->assertTrue($isWorking, "");
    }

    //As a member of the public
    //So I can return an escooter I've rented
    //I want to dock my escooter at the docking station
    public function testReturnEScooter()
    {
        $station = new DockingStation();
        $escooter = new EScooter();

        $receivedEscooter = $station->hasDockedEScooter();
        $this->assertFalse($receivedEscooter);


        $station->returnEscooter($escooter);
        $returnedScooter = $station->hasDockedEScooter();
        $this->assertTrue($returnedScooter);
    }

}