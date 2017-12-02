<?php

namespace ValueObjects\Exception\Time;

final class YearInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid year value <%s>', $value));

        $this->code = 'year_invalid';
    }
}