<?php

namespace ValueObjects\String;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\String\StringInvalidException;

class StringLiteral extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws StringInvalidException
     */
    protected function guard($value)
    {
        if (false === is_string($value)){
            throw new StringInvalidException($value);
        }

        return true;
    }
}