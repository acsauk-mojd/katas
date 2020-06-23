<?php declare(strict_types=1);

namespace App;

class DockingStation
{
    public $escooter;

    public function releaseEScooter()
    {
        return new EScooter();
    }

    public function hasDockedEScooter(): bool
    {
        return !is_null($this->escooter);
    }

    public function dockEscooter(EScooter $escooter)
    {
        $this->escooter = $escooter;
    }
}