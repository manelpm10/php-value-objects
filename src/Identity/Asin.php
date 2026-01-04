<?php

namespace ValueObjects\Identity;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Identity\AsinInvalidException;

class Asin extends AbstractValueObject
{
    /**
     * @throws AsinInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if (!preg_match('@^[A-Z0-9]{10}$@', $value)){
            throw new AsinInvalidException($value);
        }

        return true;
    }
}