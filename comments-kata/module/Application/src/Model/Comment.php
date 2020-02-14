<?php

declare(strict_types=1);

namespace Application\Model;

use DateTime;

class Comment
{
    /**
     * @var DateTime
     */
    private $timeStamp;

    public function setTimeStamp(DateTime $timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }

    public function getTimeStamp(): DateTime
    {
        return $this->timeStamp;
    }
}