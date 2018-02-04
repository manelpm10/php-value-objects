<?php

namespace ValueObjects\Exception\Web;

final class EmailAddressInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid Email address value <%s>', $value));

        $this->code = 'email_address_invalid';
    }
}