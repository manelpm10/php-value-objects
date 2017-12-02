<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\DayInvalidException;

class Day extends AbstractValueObject
{
    const MIN_DAY = 1;
    const MAX_DAY = 31;

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws DayInvalidException
     */
    protected function guard($value)
    {
        if ($value < self::MIN_DAY || $value > self::MAX_DAY) {
            throw new DayInvalidException($value);
        }

        return true;
    }
}