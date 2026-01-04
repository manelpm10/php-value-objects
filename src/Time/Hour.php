<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\HourInvalidException;

class Hour extends AbstractValueObject
{
    const MIN_HOUR = 0;
    const MAX_HOUR = 23;

    /**
     * @throws HourInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || (false === $filteredValue && !is_numeric($value)) || $filteredValue < self::MIN_HOUR || $filteredValue > self::MAX_HOUR) {
            throw new HourInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): int
    {
        return $value + 0;
    }
}