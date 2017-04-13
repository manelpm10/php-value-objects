<?php

namespace ValueObjects\Exception\Money;

/**
 * Class CurrencyCodeInvalidException.
 */
final class CurrencyCodeInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid currency code value <%s>', $value));

        $this->code = 'currency_code_invalid';
    }
}