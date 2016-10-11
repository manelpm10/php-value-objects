<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class LatitudeInvalidException.
 */
final class LatitudeInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid latitude value <%s>', $value));

        $this->code = 'latitude_invalid';
    }
}