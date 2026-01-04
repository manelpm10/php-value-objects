<?php

namespace ValueObjects\Exception\Number;

/**
 * Class RealInvalidException.
 */
final class RealInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid real value <%s>', $value));

        $this->code = 'real_invalid';
    }
}