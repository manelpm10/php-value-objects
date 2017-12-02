<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\MinuteInvalidException;

class Minute extends AbstractValueObject
{
    const MIN_MINUTE = 0;
    const MAX_MINUTE = 59;

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws MinuteInvalidException
     */
    protected function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || (false === $filteredValue && !is_numeric($value)) || $value < self::MIN_MINUTE || $value > self::MAX_MINUTE) {
            throw new MinuteInvalidException($value);
        }

        return true;
    }
}