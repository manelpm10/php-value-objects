<?php

namespace ValueObjects\Exception\Number;

/**
 * Class NaturalInvalidException.
 */
final class NaturalInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid natural number value <%s>', $value));

        $this->code = 'natural_invalid';
    }
}