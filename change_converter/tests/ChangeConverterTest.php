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
        assertEquals(["£10"], $results);
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
            '£20 is converted to 2x £10' => [["£20"], 20.00],
            '£25 is converted to 2x £10 and 1x £5' => [["£20", "£5"], 25.00],
            '£85 is converted to 1x £50, 1x £20, 1x £10 and 1x £5' => [["£50", "£20", "£10", "£5"], 85.00],
            '£1.50 is converted to 1x £1 and 1x 50p' => [["£1", "50p"], 1.50],
            '£1.80 is converted to 1x £1 and 1x 50p 1x 20p and 1x 10p' => [["£1", "50p", "20p", "10p"], 1.80],
            '£1.88 is converted to 1x £1 and 1x 50p 1x 20p 1x 10p 1x 5p 1x 2p and 1x 1p' => [["£1", "50p", "20p", "10p", "5p", "2p", "1p"], 1.88],
        ];
    }





}