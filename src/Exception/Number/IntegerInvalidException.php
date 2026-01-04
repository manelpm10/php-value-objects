<?php

namespace ValueObjects\Exception\Number;

/**
 * Class IntegerInvalidException.
 */
final class IntegerInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid integer value <%s>', $value));

        $this->code = 'integer_invalid';
    }
}