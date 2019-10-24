<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
    public function testProgramCanBePassed1AndReturns1()
    {
        $sut = new Fizzbuzz();
        self::assertEquals(1, $sut->fizzbuzzer(1));
    }

    /**
     * @dataProvider remainderProvider
     */
    public function testProgramGetsRemainderOfNumberThree($result, int $number, int $dividor)
    {
        $sut = new Fizzbuzz();
        self::assertEquals($result, $sut->fizzRemainder($number,$dividor));
    }

    public function remainderProvider()
    {
        return [
            ['Fizz', 3, 3],
            [4, 4, 3],
            [2, 2, 2],
        ];
    }

    public function testProgramStartsApp()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('Fizz', $sut->fizzbuzzer(3));

    }
}
