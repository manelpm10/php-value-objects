<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\MonthInvalidException;

class Month extends AbstractValueObject
{
    const MIN_MONTH = 1;
    const MAX_MONTH = 12;

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws MonthInvalidException
     */
    protected function guard($value)
    {
        if ($value < self::MIN_MONTH || $value > self::MAX_MONTH) {
            throw new MonthInvalidException($value);
        }

        return true;
    }
}