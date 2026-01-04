<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\SecondInvalidException;

class Second extends AbstractValueObject
{
    const MIN_SECOND = 0;
    const MAX_SECOND = 59;

    /**
     * @throws SecondInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || (false === $filteredValue && !is_numeric($value)) || $value < self::MIN_SECOND || $value > self::MAX_SECOND) {
            throw new SecondInvalidException($value);
        }

        return true;
    }
}