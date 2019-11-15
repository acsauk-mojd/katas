<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
    public function testProgramCanBePassed1AndReturns1()
    {
        $sut = new Fizzbuzz();
        self::assertEquals(1, $sut->startFizzBuzzer([1]));
    }

    /**
     * @dataProvider remainderProvider
     * @group fish
     */
    public function testProgramLogic($result, int $number)
    {
        $sut = new Fizzbuzz();
        self::assertEquals($result, $sut->returnFizzOrBuzzOrANumber($number));
    }

    public function remainderProvider()
    {
        return [
            '9 divided by 3 returns Fizz'                      => ['Fizz', 9],
            '12 divided by 3 returns Fizz'                     => ['Fizz', 12],
            '4 divided by 3 returns the number passed in (4)'  => [4, 4],
            '2 divided by 2 returns the number passed in (2)'  => [2, 2],
            '5 divided by 5 returns Buzz'                      => ['Buzz', 5],
            '15 divided by 5 returns Buzz'                     => ['FizzBuzz', 15],
        ];
    }

    public function testProgramStartsApp()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('Fizz', $sut->startFizzBuzzer(3));

    }
}
