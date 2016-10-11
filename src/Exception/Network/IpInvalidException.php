<?php

namespace ValueObjects\Exception\Network;

/**
 * Class IpInvalidException.
 */
final class IpInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid IP value <%s>', $value));

        $this->code = 'ip_invalid';
    }
}