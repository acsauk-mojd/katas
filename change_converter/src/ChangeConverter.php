<?php declare(strict_types=1);

namespace App;

class ChangeConverter
{
    //Array $notesAndCoins;
    public function convert(Float $change)
    {
        $results = [];

        while ($change / 50.00 >= 1){
            array_push($results, "£50");
            $change -= 50.00;
        }

        while ($change / 20.00 >= 1){
            array_push($results, "£20");
            $change -= 20.00;
        }

        while ($change / 10.00 >= 1){
            array_push($results, "£10");
            $change -= 10.00;
        }

        while ($change / 5.00 >= 1){
            array_push($results, "£5");
            $change -= 5.00;
        }

        while ($change / 1.00 >= 1){
            array_push($results, "£1");
            $change -= 1.00;
        }

        while ($change / 0.50 >= 1){
            array_push($results, "50p");
            $change -= 0.50;
        }

        return $results;
    }
}