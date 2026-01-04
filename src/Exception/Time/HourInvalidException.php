<?php

namespace ValueObjects\Exception\Time;

final class HourInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid hour value <%s>', $value));

        $this->code = 'hour_invalid';
    }
}