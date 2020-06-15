<?php declare(strict_types=1);

namespace App;

class DockingStation
{
    public function releaseEScooter(){
        return new EScooter();
    }
}