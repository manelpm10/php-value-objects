<?php

namespace ValueObjects\Exception\Network;

/**
 * Class IpInvalidException.
 */
final class IpInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid IP value <%s>', $value));

        $this->code = 'ip_invalid';
    }
}