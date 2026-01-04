<?php

namespace ValueObjects\Money;

use Symfony\Component\Intl\Currencies;
use Throwable;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Money\CurrencyCodeInvalidException;

class CurrencyCode extends AbstractValueObject
{
    /**
     * @throws CurrencyCodeInvalidException
     */
    protected function guard(mixed $value): bool
    {
        $value = $this->normalizeValue($value);
        try {
            Currencies::getName($value);
        } catch(Throwable $e) {
            throw new CurrencyCodeInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue(mixed $value): string
    {
        return strtoupper($value);
    }
}