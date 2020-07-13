<?php declare(strict_types=1);

namespace App;

class Fizzbuzz
{
    public function run($input)
    {
        if(!is_int($input)) {
            throw new ErrorException('Input was not integer.');
        }
     return 'Fizz';
    }
}