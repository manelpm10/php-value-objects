<?php

namespace ValueObjects\Exception\Time;

final class DateInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid date value <%s>', $value));

        $this->code = 'date_invalid';
    }
}