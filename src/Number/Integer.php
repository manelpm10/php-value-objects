<?php

namespace ValueObjects\Number;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Number\IntegerInvalidException;

class Integer extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param integer $value
     * @return boolean
     * @throws IntegerInvalidException
     */
    protected function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || false === $filteredValue){
            throw new IntegerInvalidException($value);
        }

        return true;
    }

    /**
     * Convert the valid integer (string, int...) to native integer.
     *
     * @param mixed $value
     * @return int
     */
    protected function normalizeValue($value)
    {
        return $value + 0;
    }
}