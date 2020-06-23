<?php declare(strict_types=1);

namespace App;

class DockingStation
{
    public ?EScooter $escooter = null;

    public function releaseEScooter()
    {
        return $this->escooter;
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