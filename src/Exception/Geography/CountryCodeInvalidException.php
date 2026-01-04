<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class CountryCodeInvalidException.
 */
final class CountryCodeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid country code value <%s>', $value));

        $this->code = 'country_code_invalid';
    }
}