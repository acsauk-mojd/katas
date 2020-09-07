<?php declare(strict_types=1);

namespace App;

use phpDocumentor\Reflection\Types\Integer;

class ChangeConverter
{
    private $results = [];
    private array $notesAndCoins = [50.00, 20.00, 10.00, 5.00, 2.00, 1.00, 0.50, 0.20, 0.10];

    public function convert(Float $change)
    {
        foreach($this->notesAndCoins as $divisor)
        {
            while (($change / $divisor) >= 1 && $change > 0){
                var_dump("Inside while loop");
                if ($divisor < 1) {
                    $pence = $divisor * 100;
                    array_push($this->results, strval($pence) . "p");
                } else {
                    array_push($this->results, "£".strval($divisor));
                }
                $change -= $divisor;
            }
        }
        return $this->results;
    }
}