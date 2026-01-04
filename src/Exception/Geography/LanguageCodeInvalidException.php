<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class LanguageCodeInvalidException.
 */
final class LanguageCodeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid language code value <%s>', $value));

        $this->code = 'language_code_invalid';
    }
}