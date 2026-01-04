<?php

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Countries;
use Throwable;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\CountryCodeInvalidException;

class CountryCode extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws CountryCodeInvalidException
     */
    protected function guard($value)
    {
        $value = $this->normalizeValue($value);
        try {
            Countries::getName($value);
        } catch (Throwable $e) {
            throw new CountryCodeInvalidException($value);
        }

        return true;
    }

    /**
     * Convert the lower case country code to upper case.
     *
     * @param string $value
     * @return string
     */
    protected function normalizeValue($value): string
    {
        return strtoupper($value);
    }
}