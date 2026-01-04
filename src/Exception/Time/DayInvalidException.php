<?php

namespace ValueObjects\Exception\Time;

final class DayInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid day value <%s>', $value));

        $this->code = 'day_invalid';
    }
}