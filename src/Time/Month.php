<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\MonthInvalidException;

class Month extends AbstractValueObject
{
    const MIN_MONTH = 1;
    const MAX_MONTH = 12;

    /**
     * @throws MonthInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if ($value < self::MIN_MONTH || $value > self::MAX_MONTH) {
            throw new MonthInvalidException($value);
        }

        return true;
    }
}