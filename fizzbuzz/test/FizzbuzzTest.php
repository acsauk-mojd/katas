<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
    public function testProgramCanBePassed1AndReturns1()
    {
        $sut = new Fizzbuzz();
        self::assertEquals([1], $sut->startFizzBuzzer([1]));
    }

    /**
     * @dataProvider remainderProvider
     */
    public function testProgramLogic($result, array $numbers)
    {
        $sut = new Fizzbuzz();
        self::assertEquals($result, $sut->returnFizzOrBuzzOrANumber($numbers));
    }

    public function remainderProvider()
    {
        return [
            //Test fizz buzz logic with individual values
            '9 divided by 3 returns Fizz'                      => [['Fizz'], [9]],
            '12 divided by 3 returns Fizz'                     => [['Fizz'], [12]],
            '4 divided by 3 returns the number passed in (4)'  => [[4], [4]],
            '2 divided by 2 returns the number passed in (2)'  => [[2], [2]],
            '5 divided by 5 returns Buzz'                      => [['Buzz'], [5]],
            '15 divided by 5 returns Buzz'                     => [['FizzBuzz'], [15]],

            //Test ability to pass in more than 1 value
            '9 divided by 3 returns Fizz and return 1'                      => [['Fizz',1], [9,1]],
            '6 returns Fizz, 10 returns Buzz, 15 returns FizzBuzz'          => [['Fizz','Buzz','FizzBuzz'], [6,10,15]],
        ];
    }

    public function testProgramStartsApp()
    {
        $sut = new Fizzbuzz();
        self::assertEquals(['Fizz'], $sut->startFizzBuzzer([3]));

    }

}
