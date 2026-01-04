<?php

namespace ValueObjects\Exception\Identity;

/**
 * Class UuidInvalidException.
 */
final class UuidInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid UUID value <%s>', $value));

        $this->code = 'uuid_invalid';
    }
}