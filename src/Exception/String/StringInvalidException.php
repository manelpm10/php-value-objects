<?php

namespace ValueObjects\Exception\String;

final class StringInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid string value <%s>', $value));

        $this->code = 'string_invalid';
    }
}