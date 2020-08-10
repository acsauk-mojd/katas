<?php declare(strict_types=1);

namespace App;

class ChangeConverter
{
    public function convert(Float $change)
    {
        $results = [];
        if ($change >= 50) {
            $fifty_pounds = floor($change/50);
            $i = 0;
            while ($i++ < $fifty_pounds) {
                array_push($results, "£50");
            }
            $change -= ($fifty_pounds*50);
        }
        if ($change >= 20) {
            $twenty_pounds = floor($change/20);
            $i = 0;
            while ($i++ < $twenty_pounds) {
                array_push($results, "£20");
            }
            $change -= ($twenty_pounds*20);
        }
        if ($change >= 10) {
            $ten_pounds = floor($change/10);
            $i = 0;
            while ($i++ < $ten_pounds) {
                array_push($results, "£10");
            }
            $change -= ($ten_pounds*10);
        }
        if ($change >= 5) {
            $five_pounds = floor($change/5);
            $i = 0;
            while ($i++ < $five_pounds) {
                array_push($results, "£5");
            }
            $change -= ($five_pounds*5);
        }
        if ($change >= 1) {
            $one_pounds = floor($change);
            $i = 0;
            while ($i++ < $one_pounds) {
                array_push($results, "£1");
            }
            $change -= ($one_pounds);
        }
        if ($change >= 0.5) {
            $fiftyP = $change/0.5;
            $i = 0;
            while ($i++ < $fiftyP) {
                array_push($results, "50p");
            }
            $change -= ($fiftyP*0.5);
        }
        if ($change >= 0.2) {
            $twentyP = $change/0.2;
            $i = 0;
            while ($i++ < $twentyP) {
                array_push($results, "20p");
            }
            $change -= ($twentyP*0.2);
        }
//        if ($change >= 0.1) {
//            $tenP = $change/0.1;
//            $i = 0;
//            while ($i++ < $tenP) {
//                array_push($results, "10p");
//            }
//            $change -= ($tenP*0.1);
//        }
//        if ($change >= 0.05) {
//            $fiveP = $change/0.05;
//            $i = 0;
//            while ($i++ < $fiveP) {
//                array_push($results, "5p");
//            }
//            $change -= ($fiveP*0.05);
//        }
//        if ($change >= 0.01) {
//            $oneP = $change/0.01;
//            $i = 0;
//            while ($i++ < $oneP) {
//                array_push($results, "1p");
//            }
//            $change -= ($oneP*0.01);
//        }
        return $results;
    }
}