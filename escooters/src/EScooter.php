<?php declare(strict_types=1);

namespace App;

class EScooter
{
    public $broken = false;

    static public function isWorking()
    {
        return true;
    }

    public function isBroken()
    {
        return $this->broken;
    }

    public function reportedBroken()
    {
        $this->broken = true;
    }
}