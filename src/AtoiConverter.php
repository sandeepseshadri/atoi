<?php

namespace App;

use InvalidArgumentException;

class AtoiConverter
{
    protected static $asciiMap = [
        '0' => 0,
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9
    ];
    /**
     * Converts a given Ascii string representing a number to integer
     *
     * @param $input
     * @return int
     */
    public function convert($input)
    {
        $this->checkValid($input);
        $convertedValue = 0;
        for ($i = 0; $i < strlen($input); $i++) {
            $currentElement = substr($input, $i, 1);
            $convertedValue = $this->multiplyBy10($convertedValue) + self::$asciiMap[$currentElement];
        }
        return $convertedValue;
    }

    /**
     * Checks to make sure the input is valid number
     * @param $input
     */
    protected function checkValid($input)
    {
        if (is_null($input) || preg_match('/[^0-9]/', $input)) {
            throw new InvalidArgumentException('Given input is not a valid number');
        }
    }

    /**
     * Uses bit manipulation to multiply by 10.
     * @param $convertedValue
     * @return int
     */
    protected function multiplyBy10($convertedValue)
    {
        return ($convertedValue << 3) + ($convertedValue << 1);
    }
}
