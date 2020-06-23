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
        $escooter = new EScooter();
        $station -> dockEscooter($escooter);
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
    //So I can decide whether to use the docking station
    //I want to see a an escooter that has been docked
    public function testIfEscooterHasBeenDocked()
    {
        $station = new DockingStation();
        $escooter = new EScooter();

        $station->dockEscooter($escooter);
        $this->assertEquals($escooter, $station->escooter);
    }

    //As a member of the public
    //So I can return an escooter I've rented
    //I want to dock my escooter at the docking station
    public function testUserCanDockEScooter()
    {
        $station = new DockingStation();
        $escooter = new EScooter();

        $receivedEscooter = $station->hasDockedEScooter();
        $this->assertFalse($receivedEscooter);

        $station->dockEscooter($escooter);
        $returnedScooter = $station->hasDockedEScooter();
        $this->assertTrue($returnedScooter);
    }

    //As a member of the public,
    //So that I am not confused and charged unnecessarily,
    //I'd like docking stations not to release escooters when there are none available.
    public function testStationOnlyReleasesEScooterWhenOccupied()
    {
        $station = new DockingStation();

        $this->assertNull($station->releaseEScooter());
    }

    //As a maintainer of the system,
    //So that I can control the distribution of escooters,
    //I'd like docking stations not to accept more escooters than their capacity.
    public function testStationNotAcceptEScooterAboveCapacity(){
        $station = new DockingStation();
        $station->capacity = 2;
        $escooter1 = new EScooter();
        $escooter2 = new EScooter();
        $escooter3 = new EScooter();
        $station->dockEscooter($escooter1);
        $station->dockEscooter($escooter2);
        $station->dockEscooter($escooter3);
        $this->expectException(\Exception::class);
    }

}