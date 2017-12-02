<?php

namespace ValueObjects\Exception\Time;

final class MinuteInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid minute value <%s>', $value));

        $this->code = 'minute_invalid';
    }
}