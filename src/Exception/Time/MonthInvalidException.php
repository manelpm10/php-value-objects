<?php

namespace ValueObjects\Exception\Time;

final class MonthInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid month value <%s>', $value));

        $this->code = 'month_invalid';
    }
}