<?php

namespace ValueObjects\Geography;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LatitudeInvalidException;

class Latitude extends AbstractValueObject
{
    const MIN_LATITUDE = -90;
    const MAX_LATITUDE = 90;

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws LatitudeInvalidException
     */
    public function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT);

        // FILTER_VALIDATE_FLOAT validates true as 1.
        if (true === $value || false === $filteredValue || $value < self::MIN_LATITUDE || $value > self::MAX_LATITUDE){
            throw new LatitudeInvalidException($value);
        }

        return true;
    }

    /**
     * Convert the valid latitude (string, int...) to native float.
     *
     * @param mixed $value
     * @return float
     */
    protected function normalizeValue($value)
    {
        return $value + 0;
    }
}