<?php

namespace ValueObjects\Geography;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LatitudeInvalidException;

class Latitude extends AbstractValueObject
{
    const MIN_LATITUDE = -90;
    const MAX_LATITUDE = 90;

    /**
     * @throws LatitudeInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT);

        // FILTER_VALIDATE_FLOAT validates true as 1.
        if (true === $value || false === $filteredValue || $value < self::MIN_LATITUDE || $value > self::MAX_LATITUDE){
            throw new LatitudeInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): mixed
    {
        return $value + 0;
    }
}