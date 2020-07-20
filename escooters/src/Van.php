<?php


namespace App;


class Van
{
    /** @var ?EScooter */
    public $eScooter = null;

    public function releaseEscooter()
    {
        return $this->eScooter;
    }

    public function collectBrokenEscooter(EScooter $EScooter)
    {
        $this->eScooter = $EScooter;
    }
}
