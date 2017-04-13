<?php

namespace ValueObjects\Geography;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Geography\LanguageCodeInvalidException;
use Symfony\Component\Intl\Intl;

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
        $languageName = Intl::getLanguageBundle()->getLanguageName($value);
        if (null === $languageName) {
            throw new LanguageCodeInvalidException($value);
        }

        return true;
    }
}