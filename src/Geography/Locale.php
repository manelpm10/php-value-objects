<?php

declare(strict_types=1);

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Locales;
use Throwable;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LocaleInvalidException;

class Locale extends AbstractValueObject
{
    /**
     * @throws LocaleInvalidException
     */
    protected function guard(mixed $value): bool
    {
        try {
            Locales::getName($value);
        } catch (Throwable $throwable) {
            throw new LocaleInvalidException($value);
        }

        return true;
    }
}