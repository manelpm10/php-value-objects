<?php

namespace ValueObjects\Exception\Identity;

/**
 * Class AsinInvalidException.
 */
final class AsinInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid ASIN value <%s>', $value));

        $this->code = 'asin_invalid';
    }
}