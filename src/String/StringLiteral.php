<?php

namespace ValueObjects\String;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\String\StringInvalidException;

class StringLiteral extends AbstractValueObject
{
    /**
     * @throws StringInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if (false === is_string($value)){
            throw new StringInvalidException($value);
        }

        return true;
    }
}