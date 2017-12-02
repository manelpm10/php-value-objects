<?php

namespace ValueObjects\Exception\Time;

final class HourInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid hour value <%s>', $value));

        $this->code = 'hour_invalid';
    }
}