<?php

namespace ValueObjects\Exception\Time;

final class DateTimeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid datetime value <%s>', $value));

        $this->code = 'datetime_invalid';
    }
}