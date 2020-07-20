<?php declare(strict_types=1);

namespace App;

use Exception;

class DockingStation
{
    public array $escooters = [];
    public int $capacity = 20;
    public int $counter = 0;

    public function releaseEScooter()
    {
        if(!is_null($this->escooter) && $this->escooter->isBroken()){
            throw new Exception('This Escooter is broken');
        }
        return $this->escooter;
    }

    public function hasDockedEScooter(): bool
    {
        return !is_null($this->escooter);
    }

    public function dockEscooter(EScooter $escooter)
    {
        //check capacity is greater than 2, throw exception
        //array state - state holds docking station, add to array on each function call
        // and check againt array count

        $this->counter++;
        $this->escooter = $escooter;
        if($this->counter > $this->capacity ) {
            throw new Exception('No capacity to accept another scooter');
        }
    }

    public function releaseBrokenEscooters(Van $van)
    {
        if(!is_null($this->escooter) && $this->escooter->isBroken()){
            $van->collectBrokenEscooter($this->escooter);
        }
    }
}
