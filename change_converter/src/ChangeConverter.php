<?php declare(strict_types=1);

namespace App;

class ChangeConverter
{
    private $results = [];
    private array $notesAndCoins = [50.00, 20.00, 10.00, 5.00, 2.00, 1.00, 0.50, 0.20];

    public function convert(Float $change)
    {
        foreach($this->notesAndCoins as $divisor)
        {
            var_dump($change / $divisor);
            while (($change / $divisor) >= 1 and $change !== 0.0){
               // var_dump($change / $divisor);
                if ($divisor <= 1 ) {
                    var_dump($divisor);
                   // die;
                    $test = $divisor * 100;
                    array_push($this->results, strval($test) . "p");
                } else {
                    var_dump($divisor);
                   // die;
                    array_push($this->results, "£".strval($divisor));
                }
                $change -= $divisor;
            }
        }
        return $this->results;
    }
}