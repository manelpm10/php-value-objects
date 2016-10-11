<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class LongitudeInvalidException.
 */
final class LongitudeInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid longitude value <%s>', $value));

        $this->code = 'longitude_invalid';
    }
}