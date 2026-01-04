<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\DayInvalidException;

class Day extends AbstractValueObject
{
    const MIN_DAY = 1;
    const MAX_DAY = 31;

    /**
     * @throws DayInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if ($value < self::MIN_DAY || $value > self::MAX_DAY) {
            throw new DayInvalidException($value);
        }

        return true;
    }
}