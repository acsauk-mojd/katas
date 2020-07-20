<?php

declare(strict_types=1);

namespace App\Tests;

use App\Van;
use PHPUnit\Framework\TestCase;
use App\DockingStation;
use App\EScooter;

class DockingStationTest extends TestCase
{

    /**
     * @var DockingStation
     */
    private DockingStation $station;

    /**
     * @var EScooter
     */
    private $escooter;

    public function setUp(): void
    {
        $this->station  = new DockingStation();
        $this->escooter = new EScooter();
    }
    //As a person,
    //So that I can ride an escooter,
    //I need a docking station to release a escooter.
    public function testCanReleaseEScooter()
    {
        $this->station -> dockEscooter($this->escooter);
        $this->escooter = $this->station->releaseEScooter();
        $this->assertInstanceOf(EScooter::class, $this->escooter);
    }

    //As a person,
    //So that I can ride a escooter safely,
    //I need to know if the escooter I'm interested in is working
    public function testEScooterIsWorking()
    {
       $isWorking = $this->escooter->isWorking();
       $this->assertTrue($isWorking, "");
    }

    //As a member of the public
    //So I can decide whether to use the docking station
    //I want to see a an escooter that has been docked
    public function testIfEscooterHasBeenDocked()
    {
        $this->station->dockEscooter($this->escooter);
        $this->assertEquals($this->escooter, $this->station->escooter);
    }

    //As a member of the public
    //So I can return an escooter I've rented
    //I want to dock my escooter at the docking station
    public function testUserCanDockEScooter()
    {
        $receivedEscooter = $this->station->hasDockedEScooter();
        $this->assertFalse($receivedEscooter);

        $this->station->dockEscooter($this->escooter);
        $returnedScooter = $this->station->hasDockedEScooter();
        $this->assertTrue($returnedScooter);
    }

    //As a member of the public,
    //So that I am not confused and charged unnecessarily,
    //I'd like docking stations not to release escooters when there are none available.
    public function testStationOnlyReleasesEScooterWhenOccupied()
    {
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

        $this->expectException(\Exception::class);

        $this->station->dockEscooter($this->escooter);
        $this->station->dockEscooter($this->escooter);
        $this->station->dockEscooter($this->escooter);
    }

    //As a system maintainer,
    //So that I can plan the distribution of escooters,
    //I want a docking station to have a default capacity of 20 escooters.
    public function testStationHasCapacityOf20Escooters(){

        for ($i=0; $i < 20; $i++) {
            $this->station->dockEscooter($this->escooter);
        }

        $this->expectException(\Exception::class);

        $this->station->dockEscooter($this->escooter);
    }

    //As a member of the public,
    //So that I reduce the chance of getting a broken escooters in future,
    //I'd like to report an escooters as broken when I return it.
    public function testEScooterReportedAsBrokenWhenReturned(){
        $this->AssertEquals(false, $this->escooter->isBroken());

        $this->escooter->reportedBroken();

        $this->AssertEquals(true, $this->escooter->isBroken());
    }

    //As a maintainer of the system,
    //So that I can manage broken escooters and not disappoint users,
    //I'd like docking stations not to release broken escooters.
    public function testStationDoesNotReleaseBrokenEscooters()
    {
        $this->escooter->reportedBroken();
        $this->station->dockEscooter($this->escooter);

        $this->expectException(\Exception::class);
        $this->station->releaseEScooter();
    }

    //As a maintainer of the system,
    //So that I can manage broken escooters and not disappoint users,
    //I'd like vans to take broken escooters from docking stations and deliver them to garages to be fixed.
    public function testVansTakeBrokenEscootersToGarages()
    {
        $van = new Van();

        $brokenEscooter = new EScooter();
        $brokenEscooter->reportedBroken();

        $this->station->dockEscooter($brokenEscooter);
        $this->station->dockEscooter($this->escooter);

        $this->station->releaseBrokenEscooters($van);

        $this->assertSame($brokenEscooter, $van->releaseEscooter());
        $this->AssertEquals($this->escooter, $this->station->releaseEScooter());
    }

}
