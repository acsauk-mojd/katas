<?php


namespace App\Tests;


use App\EScooter;
use App\Van;
use PHPUnit\Framework\TestCase;

class VanTest extends TestCase
{
    public function testCollectBrokenEscooter()
    {
        $escooter = new EScooter();
        $van = new Van();

        $van->collectBrokenEscooter($escooter);

        self::assertSame($escooter, $van->releaseEscooter());
    }
}
