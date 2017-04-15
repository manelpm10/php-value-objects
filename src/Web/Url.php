<?php

namespace ValueObjects\Web;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Web\UrlInvalidException;

class Url extends AbstractValueObject
{
    protected function guard($value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new UrlInvalidException($value);
        }

        return true;
    }
}