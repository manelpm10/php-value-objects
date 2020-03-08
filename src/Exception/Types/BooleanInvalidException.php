<?php

namespace ValueObjects\Exception\Types;

final class BooleanInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid boolean value <%s>', $value));

        $this->code = 'string_invalid';
    }
}