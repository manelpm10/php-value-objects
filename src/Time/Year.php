<?php

namespace ValueObjects\Time;

use InvalidArgumentException;
use ValueObjects\Exception\Time\YearInvalidException;
use ValueObjects\Number\Natural;

class Year extends Natural
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws YearInvalidException
     */
    protected function guard($value)
    {
        try {
            parent::guard($value);
        } catch(InvalidArgumentException $e) {
            throw new YearInvalidException($value);
        }

        return true;
    }
}