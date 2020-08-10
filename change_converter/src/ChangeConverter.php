<?php declare(strict_types=1);

namespace App;

class ChangeConverter
{
    private $results = [];
    private array $notesAndCoins = [50.00, 20.00, 10.00, 5.00. 1.00, 0.50];

    public function convertDivisor(Float $change, Float $divisor)
    {
        while ($change / $divisor >= $divisor){
            array_push($this->results, "£".strval($divisor));
            $change -= $divisor;
        }
    }

    public function convert(Float $change)
    {
        foreach($this->notesAndCoins as $divisor);
        {
            $this->convertDivisor($change, $divisor);
        }

//        while ($change / 50.00 >= 1){
//            array_push($this->results, "£50");
//            $change -= 50.00;
//        }
//
//        while ($change / 20.00 >= 1){
//            array_push($this->results, "£20");
//            $change -= 20.00;
//        }
//
//        while ($change / 10.00 >= 1){
//            array_push($this->results, "£10");
//            $change -= 10.00;
//        }
//
//        while ($change / 5.00 >= 1){
//            array_push($this->results, "£5");
//            $change -= 5.00;
//        }

//        while ($change / 1.00 >= 1){
//            array_push($this->results, "£1");
//            $change -= 1.00;
//        }
//
//        while ($change / 0.50 >= 1){
//            array_push($this->results, "50p");
//            $change -= 0.50;
//        }

        return $this->results;
    }
}