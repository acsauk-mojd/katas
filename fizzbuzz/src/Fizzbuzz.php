<?php

declare(strict_types=1);

class Fizzbuzz
{
    public function startFizzBuzzer(array $numbers)
    {
            return $this->returnFizzOrBuzzOrANumber($numbers);
    }

    public function returnFizzOrBuzzOrANumber(array $numbers)
    {
        $result = [];

        foreach ($numbers as $number) {

            if($number % 3 === 0 && $number % 5 === 0) {
                $result[] = 'FizzBuzz';
                continue;
            }

            elseif($number % 3 === 0) {
                $result[] = 'Fizz';
                continue;
            }

            elseif($number % 5 === 0) {
                $result[] = 'Buzz';
                continue;
            }

            $result[] = $number;
        }

        return $result;

    }
}
