<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class CountryCodeInvalidException.
 */
final class CountryCodeInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid country code value <%s>', $value));

        $this->code = 'country_code_invalid';
    }
}