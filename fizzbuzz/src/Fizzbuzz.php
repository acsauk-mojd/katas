<?php

declare(strict_types=1);

class Fizzbuzz
{
    public function startFizzBuzzer(array $number)
    {
            return $this->returnFizzOrBuzzOrANumber($number);
    }

    public function returnFizzOrBuzzOrANumber(array $number)
    {
         $number = $number[0];

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
