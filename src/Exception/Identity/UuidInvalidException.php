<?php

namespace ValueObjects\Exception\Identity;

/**
 * Class UuidInvalidException.
 */
final class UuidInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid UUID value <%s>', $value));

        $this->code = 'uuid_invalid';
    }
}