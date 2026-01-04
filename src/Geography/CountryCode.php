<?php

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Countries;
use Throwable;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\CountryCodeInvalidException;

class CountryCode extends AbstractValueObject
{
    /**
     * @throws CountryCodeInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $value = $this->normalizeValue($value);
        try {
            Countries::getName($value);
        } catch (Throwable $e) {
            throw new CountryCodeInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): string
    {
        return strtoupper($value);
    }
}