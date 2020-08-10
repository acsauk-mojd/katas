<?php declare(strict_types=1);

namespace App\Tests;

use App\ChangeConverter;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class ChangeConverterTest extends TestCase
{
    public function testItsChangeConverterClass()
    {
        $test = new ChangeConverter();
        $this->assertInstanceOf(ChangeConverter::class, $test);
    }

    public function testInput()
    {
        $test = new ChangeConverter();
        $results = $test->convert(10.00);
        $this->assertIsArray($results);
        assertEquals(["£10"], $test->convert(10.00));
    }

    public function testInputNotFloat()
    {
        $test = new ChangeConverter();
        $this->expectException(\TypeError::class);
        $results = $test->convert("string");
    }
    /**
     * @dataProvider changeProvider
     */
    public function testLargerInputsBrokenDownIntoSmallerAmounts($expected, $change)
    {
        $test = new ChangeConverter();
        $this->assertSame($expected, $test->convert($change));
    }
    public function changeProvider()
    {
        return [
            '£20 is converted to 2x £10' => [["£10", "£10"], 20.00],
            '£25 is converted to 2x £10 and 1x £5' => [["£10", "£10", "£5"], 25.00],
        ];
    }





}