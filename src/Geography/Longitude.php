<?php

namespace ValueObjects\Geography;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LongitudeInvalidException;

class Longitude extends AbstractValueObject
{
    const MIN_LONGITUDE = -180;
    const MAX_LONGITUDE = 180;

    /**
     * Guard that value object is valid.
     *
     * @param mixed $value
     * @return boolean
     * @throws LongitudeInvalidException
     */
    public function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT);

        // FILTER_VALIDATE_FLOAT validates true as 1.
        if (true === $value || false === $filteredValue || $value < self::MIN_LONGITUDE || $value > self::MAX_LONGITUDE){
            throw new LongitudeInvalidException($value);
        }

        return true;
    }

    /**
     * Convert the valid longitude (string, int...) to native float.
     *
     * @param mixed $value
     * @return float
     */
    protected function normalizeValue($value)
    {
        return $value + 0;
    }
}