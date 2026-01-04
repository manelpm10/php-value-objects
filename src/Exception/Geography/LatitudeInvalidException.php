<?php

namespace ValueObjects\Exception\Geography;

/**
 * Class LatitudeInvalidException.
 */
final class LatitudeInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid latitude value <%s>', $value));

        $this->code = 'latitude_invalid';
    }
}