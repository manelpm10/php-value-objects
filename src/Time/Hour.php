<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\HourInvalidException;

class Hour extends AbstractValueObject
{
    const MIN_HOUR = 0;
    const MAX_HOUR = 23;

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws HourInvalidException
     */
    protected function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || (false === $filteredValue && !is_numeric($value)) || $filteredValue < self::MIN_HOUR || $filteredValue > self::MAX_HOUR) {
            throw new HourInvalidException($value);
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