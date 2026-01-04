<?php

namespace ValueObjects\Exception\Time;

final class TimeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid time value <%s>', $value));

        $this->code = 'time_invalid';
    }
}