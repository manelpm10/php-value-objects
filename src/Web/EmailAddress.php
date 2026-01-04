<?php

namespace ValueObjects\Web;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Web\EmailAddressInvalidException;

class EmailAddress extends AbstractValueObject
{
    /**
     * @throws EmailAddressInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new EmailAddressInvalidException($value);
        }

        return true;
    }
}