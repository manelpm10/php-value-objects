<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class LongitudeInvalidException.
 */
final class LongitudeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid longitude value <%s>', $value));

        $this->code = 'longitude_invalid';
    }
}