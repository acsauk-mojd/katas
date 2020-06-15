<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;

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
}