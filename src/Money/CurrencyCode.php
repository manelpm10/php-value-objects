<?php

namespace ValueObjects\Money;

use Symfony\Component\Intl\Intl;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Money\CurrencyCodeInvalidException;

class CurrencyCode extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws CurrencyCodeInvalidException
     */
    protected function guard($value)
    {
        $value = $this->normalizeValue($value);
        $currencyName = Intl::getCurrencyBundle()->getCurrencyName($value);
        if (null === $currencyName) {
            throw new CurrencyCodeInvalidException($value);
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