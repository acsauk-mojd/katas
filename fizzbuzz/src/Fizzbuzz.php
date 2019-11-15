<?php

declare(strict_types=1);

class Fizzbuzz
{
    public function startFizzBuzzer(int $number)
    {
        if(is_int($number)) {
            return $this->returnFizzOrBuzzOrANumber($number);
        }
        throw new Exception("Error Processing Request", 1);
    }

    public function returnFizzOrBuzzOrANumber(int $number)
    {
        if($number % 3 === 0 && $number % 5 === 0) {
                return 'FizzBuzz';
        }

        if($number % 3 === 0) {
                return 'Fizz';
            }

        if($number % 5 === 0) {
                return 'Buzz';
            }

        return $number;
    }
}
