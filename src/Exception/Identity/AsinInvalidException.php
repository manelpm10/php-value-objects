<?php

namespace ValueObjects\Exception\Identity;

/**
 * Class AsinInvalidException.
 */
final class AsinInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid ASIN value <%s>', $value));

        $this->code = 'asin_invalid';
    }
}