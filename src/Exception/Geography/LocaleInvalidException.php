<?php

namespace ValueObjects\Exception\Geography;

final class LocaleInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid locale value <%s>', $value));

        $this->code = 'locale_invalid';
    }
}