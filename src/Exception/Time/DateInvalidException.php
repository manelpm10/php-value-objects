<?php

namespace ValueObjects\Exception\Time;

final class DateInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid date value <%s>', $value));

        $this->code = 'date_invalid';
    }
}