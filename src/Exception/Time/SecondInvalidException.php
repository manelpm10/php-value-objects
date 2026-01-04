<?php

namespace ValueObjects\Exception\Time;

final class SecondInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid second value <%s>', $value));

        $this->code = 'second_invalid';
    }
}