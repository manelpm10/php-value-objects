<?php

namespace ValueObjects\Number;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Number\RealInvalidException;

class Real extends AbstractValueObject
{
    /**
     * @throws RealInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT);

        // FILTER_VALIDATE_FLOAT validates true as 1.
        if (true === $value || false === $filteredValue){
            throw new RealInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): mixed
    {
        return $value + 0;
    }
}