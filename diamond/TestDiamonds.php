<?php declare(strict_types=1);

use Diamonds\DiamondsPrinter;
use PHPUnit\Framework\TestCase;

Class TestDiamonds extends TestCase
{

//Given a letter, print a diamond starting with ‘A’ with the supplied letter at the widest point.
//
//For example: print-diamond ‘C’ prints
//
//  A
// B B
//C   C
// B B
//  A

    /**
     * @dataProvider letterProvider
     */
    public function testLettersPrecedingProvidedLettersAreAlsoReturnedAndMirrored(string $inputLetter, string $expectedOutput)
    {
        $diamonds = new DiamondsPrinter();
        self::assertEquals($expectedOutput, $diamonds->printDiamond($inputLetter));
    }

    public function letterProvider()
    {
        return [
            ['C', 'ABBCCBBA'], ['D', 'ABBCCDDCCBBA'], ['E', 'ABBCCDDEEDDCCBBA']
        ];
    }

    public function testDuplicateAllButLastLetter()
    {
        $diamonds = new DiamondsPrinter();
        self::assertEquals(['A', 'A', 'B', 'B', 'C'], $diamonds->duplicateAllButLastLetter(['A', 'B', 'C']));
    }

    public function testLettersAreDisplayedAsDiamonds()
    {
        $diamonds = new DiamondsPrinter();
        $expectedDiamond = <<<DIAMOND
  A
 B B
C   C
 B B
  A
DIAMOND;

    }
}
