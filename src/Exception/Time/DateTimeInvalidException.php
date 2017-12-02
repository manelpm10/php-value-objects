<?php

namespace ValueObjects\Exception\Time;

final class DateTimeInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid datetime value <%s>', $value));

        $this->code = 'datetime_invalid';
    }
}