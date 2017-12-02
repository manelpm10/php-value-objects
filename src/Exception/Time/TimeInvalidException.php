<?php

namespace ValueObjects\Exception\Time;

final class TimeInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid time value <%s>', $value));

        $this->code = 'time_invalid';
    }
}