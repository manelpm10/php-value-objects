<?php

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Languages;
use Throwable;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LanguageCodeInvalidException;

class LanguageCode extends AbstractValueObject
{
    /**
     * @throws LanguageCodeInvalidException
     */
    protected function guard(mixed $value): bool
    {
        try {
            Languages::getName($value);
        } catch(Throwable $e) {
            throw new LanguageCodeInvalidException($value);
        }

        return true;
    }
}