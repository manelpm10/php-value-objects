<?php

namespace ValueObjects\Identity;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Identity\AsinInvalidException;

class Asin extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws AsinInvalidException
     */
    protected function guard($value)
    {
        if (!preg_match('@^[A-Z0-9]{10}$@', $value)){
            throw new AsinInvalidException($value);
        }

        return true;
    }
}