<?php

declare(strict_types=1);

class Fizzbuzz
{
    public function fizzbuzzer(int $number)
    {
        if(is_int($number)) {
            return $this->fizzRemainder($number, 3);
        }
        throw new Exception("Error Processing Request", 1);
    }

    public function fizzRemainder(int $number, int $divisor)
    {
        if($divisor === 3) {
            if ($number % $divisor === 0) {
                return 'Fizz';
            }
            return $number;
        }
        return $number;
    }
}
