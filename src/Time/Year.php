<?php

namespace ValueObjects\Time;

use InvalidArgumentException;
use ValueObjects\Exception\Time\YearInvalidException;
use ValueObjects\Number\Natural;

class Year extends Natural
{
    /**
     * @throws YearInvalidException
     */
    protected function guard(mixed $value): bool
    {
        try {
            parent::guard($value);
        } catch(InvalidArgumentException $e) {
            throw new YearInvalidException($value);
        }

        return true;
    }
}