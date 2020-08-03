<?php declare(strict_types=1);

namespace App;

class ChangeConverter
{
    public function convert($float)
    {
        throw new ErrorException('Input was not a float.');
    }
}