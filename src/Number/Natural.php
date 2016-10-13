<?php

namespace ValueObjects\Number;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Number\NaturalInvalidException;

class Natural extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param integer $value
     * @return boolean
     * @throws NaturalInvalidException
     */
    protected function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || false === $filteredValue || $value < 1){
            throw new NaturalInvalidException($value);
        }

        return true;
    }

    /**
     * Convert the valid natural number (string, int, float...) to native float.
     *
     * @param mixed $value
     * @return int
     */
    protected function normalizeValue($value)
    {
        return $value + 0;
    }
}