<?php

declare(strict_types=1);

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Intl;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LocaleInvalidException;

class Locale extends AbstractValueObject
{
    protected function guard($value): bool
    {
        $localeName = Intl::getLocaleBundle()->getLocaleName($value);
        if ($localeName) {
            return true;
        }

        throw new LocaleInvalidException($value);
    }
}