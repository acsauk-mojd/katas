<?php declare(strict_types=1);

namespace App;

class ChangeConverter
{
    //Array $notesAndCoins;
    public function convert(Float $change)
    {
        $results = [];
        if ($change >= 10.00) {
            $tens = intval($change/10.00);
            $i = 0;
            while ($i < $tens) {
                array_push($results, "£10");
                $change -= 10.00;
                $i++;
            }
        }

        return $results;
    }
}