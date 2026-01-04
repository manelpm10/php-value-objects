<?php

namespace ValueObjects\Exception\Time;

final class MinuteInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid minute value <%s>', $value));

        $this->code = 'minute_invalid';
    }
}