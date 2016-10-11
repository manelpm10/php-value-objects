<?php

namespace ValueObjects\Exception\Number;

/**
 * Class IntegerInvalidException.
 */
final class IntegerInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid integer value <%s>', $value));

        $this->code = 'integer_invalid';
    }
}