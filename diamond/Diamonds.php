<?php declare(strict_types=1);

namespace Diamonds;

Class DiamondsPrinter
{
    public function printDiamond(string $letter)
    {
        $lettersArray = range('B', $letter);

        foreach($lettersArray as &$letterValue) {
            if ($letterValue == $letter) {
                break;
            }
            $letterValue .= $letterValue;
        }

        $mirroredLettersArray = array_merge($lettersArray, array_reverse($lettersArray));

        array_unshift($mirroredLettersArray, 'A');
        array_push($mirroredLettersArray, 'A');
        return implode($mirroredLettersArray);
    }

    public function duplicateAllButLastLetter(array $lettersArray)
    {
        foreach($lettersArray as $index => &$letterValue) {
            if ($index == array_key_last($lettersArray)) {
                break;
            }
            $letterValue .= $letterValue;
        }

        return $lettersArray;
    }
}
