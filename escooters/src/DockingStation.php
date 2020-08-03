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
        if(count($this->escooters) >= 1) {
            foreach($this->escooters as $i => $scooter) {
                if (!$scooter->isBroken()) {
                    return $scooter;
                }

                throw new Exception('This Escooter is broken');
            }

        }
    }

    public function hasDockedEScooter(): bool
    {
        return !empty($this->escooters);
    }

    public function dockEscooter(EScooter $escooter)
    {
        //check capacity is greater than 2, throw exception
        //array state - state holds docking station, add to array on each function call
        // and check againt array count

        $this->counter++;
        array_push($this->escooters, $escooter);
        if($this->counter > $this->capacity ) {
            throw new Exception('No capacity to accept another scooter');
        }
    }

    public function releaseBrokenEscooters(Van $van)
    {
        if(!empty($this->escooters)){

            if(count($this->escooters) >= 1) {
                foreach($this->escooters as $i => $scooter) {
                    if ($scooter->isBroken()) {
                        unset($this->escooters[$i]);
                        $van->collectBrokenEscooter($scooter);
                    }
                }

            }
        }

        return $van;
    }
}
