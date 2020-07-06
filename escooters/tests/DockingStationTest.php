<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\DockingStation;
use App\EScooter;

class DockingStationTest extends TestCase
{

    /**
     * @var DockingStation
     */
    private DockingStation $station;

    public function setUp(): void
    {
        $this->station = new DockingStation();
    }
    //As a person,
    //So that I can ride an escooter,
    //I need a docking station to release a escooter.
    public function testCanReleaseEScooter()
    {
        $escooter = new EScooter();
        $this->station -> dockEscooter($escooter);
        $escooter = $this->station->releaseEScooter();
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
        $escooter = new EScooter();

        $this->station->dockEscooter($escooter);
        $this->assertEquals($escooter, $this->station->escooter);
    }

    //As a member of the public
    //So I can return an escooter I've rented
    //I want to dock my escooter at the docking station
    public function testUserCanDockEScooter()
    {
        $escooter = new EScooter();

        $receivedEscooter = $this->station->hasDockedEScooter();
        $this->assertFalse($receivedEscooter);

        $this->station->dockEscooter($escooter);
        $returnedScooter = $this->station->hasDockedEScooter();
        $this->assertTrue($returnedScooter);
    }

    //As a member of the public,
    //So that I am not confused and charged unnecessarily,
    //I'd like docking stations not to release escooters when there are none available.
    public function testStationOnlyReleasesEScooterWhenOccupied()
    {
        $this->station = new DockingStation();

        $this->assertNull($this->station->releaseEScooter());
    }

    //As a maintainer of the system,
    //So that I can control the distribution of escooters,
    //I'd like docking stations not to accept more escooters than their capacity.
    //As a system maintainer,
    //So that busy areas can be served more effectively,
    //I want to be able to specify a larger capacity of escooters when necessary.
    public function testStationNotAcceptEScooterAboveCapacity(){
        $this->station->capacity = 2;
        $escooter1 = new EScooter();
        $escooter2 = new EScooter();
        $escooter3 = new EScooter();

        $this->expectException(\Exception::class);

        $this->station->dockEscooter($escooter1);
        $this->station->dockEscooter($escooter2);
        $this->station->dockEscooter($escooter3);
    }

    //As a system maintainer,
    //So that I can plan the distribution of escooters,
    //I want a docking station to have a default capacity of 20 escooters.
    public function testStationHasCapacityOf20Escooters(){

        for ($i=0; $i < 20; $i++) {
            $escooter = new EScooter();
            $this->station->dockEscooter($escooter);
        }

        $this->expectException(\Exception::class);

        $this->station->dockEscooter($escooter);
    }

    //As a member of the public,
    //So that I reduce the chance of getting a broken escooters in future,
    //I'd like to report an escooters as broken when I return it.
    public function testEScooterReportedAsBrokenWhenReturned(){
        $escooter = new EScooter();
        $normalScooter = $escooter->isBroken();
        $this->AssertEquals(false, $normalScooter);

        $escooter->reportedBroken();

        $brokenScooter = $escooter->isBroken();
        $this->AssertEquals(true,$brokenScooter);
    }

}