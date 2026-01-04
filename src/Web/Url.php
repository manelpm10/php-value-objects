<?php

namespace ValueObjects\Web;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Web\UrlInvalidException;

class Url extends AbstractValueObject
{
    /**
     * @throws UrlInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new UrlInvalidException($value);
        }

        return true;
    }
}