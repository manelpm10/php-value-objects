<?php

declare(strict_types=1);

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Locales;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LocaleInvalidException;

class Locale extends AbstractValueObject
{
    protected function guard($value): bool
    {
        try {
            Locales::getName($value);

            return true;
        } catch (\Exception $exception) {
            throw new LocaleInvalidException($value);
        }
    }
}