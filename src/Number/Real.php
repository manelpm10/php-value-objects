<?php

namespace ValueObjects\Number;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Number\RealInvalidException;

class Real extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param float $value
     * @return boolean
     * @throws RealInvalidException
     */
    public function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT);

        // FILTER_VALIDATE_FLOAT validates true as 1.
        if (true === $value || false === $filteredValue){
            throw new RealInvalidException($value);
        }

        return true;
    }

    /**
     * Convert the valid integer (string, int...) to native integer.
     *
     * @param mixed $value
     * @return float
     */
    protected function normalizeValue($value)
    {
        return $value + 0;
    }
}