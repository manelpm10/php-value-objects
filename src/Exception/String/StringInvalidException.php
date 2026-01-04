<?php

namespace ValueObjects\Exception\String;

final class StringInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid string value <%s>', $value));

        $this->code = 'string_invalid';
    }
}