<?php

namespace ValueObjects\Exception\Money;

/**
 * Class CurrencyCodeInvalidException.
 */
final class CurrencyCodeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid currency code value <%s>', $value));

        $this->code = 'currency_code_invalid';
    }
}