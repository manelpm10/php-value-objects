<?php

namespace ValueObjects\Geography;

use Symfony\Component\Intl\Languages;
use Throwable;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LanguageCodeInvalidException;

class LanguageCode extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws LanguageCodeInvalidException
     */
    protected function guard($value)
    {
        try {
            Languages::getName($value);
        } catch(Throwable $e) {
            throw new LanguageCodeInvalidException($value);
        }

        return true;
    }
}