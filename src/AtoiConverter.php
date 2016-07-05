<?php

namespace App;

use InvalidArgumentException;

class AtoiConverter
{
    /**
     * Converts a given Ascii string representing a number to integer
     *
     * @param $input
     * @return int
     */
    public function convert($input)
    {
        $this->isValid($input);
        $convertedValue = 0;
        for ($i = 0; $i< strlen($input); $i++) {
            $convertedValue = $this->multiplyBy10($convertedValue) + substr($input, $i, 1);
        }
        return $convertedValue;
    }

    /**
     * Checks to make sure the input is valid number
     * @param $input
     */
    protected function isValid($input)
    {
        if (is_null($input) || preg_match('/[^0-9]/', $input)) {
            throw new InvalidArgumentException();
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
