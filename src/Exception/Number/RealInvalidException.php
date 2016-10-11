<?php

namespace ValueObjects\Exception\Number;

/**
 * Class RealInvalidException.
 */
final class RealInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid real value <%s>', $value));

        $this->code = 'real_invalid';
    }
}