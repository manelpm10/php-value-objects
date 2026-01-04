<?php

namespace ValueObjects\Geography;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LongitudeInvalidException;

class Longitude extends AbstractValueObject
{
    const MIN_LONGITUDE = -180;
    const MAX_LONGITUDE = 180;

    /**
     * @throws LongitudeInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT);

        // FILTER_VALIDATE_FLOAT validates true as 1.
        if (true === $value || false === $filteredValue || $value < self::MIN_LONGITUDE || $value > self::MAX_LONGITUDE){
            throw new LongitudeInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): mixed
    {
        return $value + 0;
    }
}