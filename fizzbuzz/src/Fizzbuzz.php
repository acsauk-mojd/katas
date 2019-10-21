<?php declare(strict_types=1);

class Fizzbuzz
{
    public function fizzbuzzer(string $number)
    {
        if(is_numeric($number)) {
            return $number;
        }
        throw new Exception("Error Processing Request", 1);
    }

    public function fizz(string $word)
    {
        return 'Fizz';
    }
}
