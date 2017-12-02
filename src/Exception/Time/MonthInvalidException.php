<?php

namespace ValueObjects\Exception\Time;

final class MonthInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid month value <%s>', $value));

        $this->code = 'month_invalid';
    }
}