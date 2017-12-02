<?php

namespace ValueObjects\Exception\Time;

final class DayInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid day value <%s>', $value));

        $this->code = 'day_invalid';
    }
}