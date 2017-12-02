<?php

namespace ValueObjects\Exception\Time;

final class SecondInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid second value <%s>', $value));

        $this->code = 'second_invalid';
    }
}