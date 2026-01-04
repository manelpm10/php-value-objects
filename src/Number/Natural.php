<?php

namespace ValueObjects\Number;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Number\NaturalInvalidException;

class Natural extends AbstractValueObject
{
    /**
     * @throws NaturalInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_INT);

        // FILTER_VALIDATE_INT validates true as 1.
        if (true === $value || false === $filteredValue || $value < 1){
            throw new NaturalInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): int
    {
        return $value + 0;
    }
}