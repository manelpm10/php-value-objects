<?php

namespace ValueObjects\Exception\Number;

/**
 * Class NaturalInvalidException.
 */
final class NaturalInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid natural number value <%s>', $value));

        $this->code = 'natural_invalid';
    }
}