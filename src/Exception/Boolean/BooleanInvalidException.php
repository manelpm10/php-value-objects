<?php

namespace ValueObjects\Exception\Boolean;

final class BooleanInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid boolean value <%s>', $value));

        $this->code = 'string_invalid';
    }
}