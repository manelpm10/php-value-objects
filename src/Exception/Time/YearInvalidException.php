<?php

namespace ValueObjects\Exception\Time;

final class YearInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid year value <%s>', $value));

        $this->code = 'year_invalid';
    }
}