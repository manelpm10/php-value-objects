<?php

namespace ValueObjects\Geography;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\CountryCodeInvalidException;
use Symfony\Component\Intl\Intl;

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
        $countryName = Intl::getRegionBundle()->getCountryName($value);
        if (null === $countryName) {
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
    protected function normalizeValue($value)
    {
        return strtoupper($value);
    }
}