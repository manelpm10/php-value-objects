<?php

namespace ValueObjects\Exception\Web;

final class EmailAddressInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid Email address value <%s>', $value));

        $this->code = 'email_address_invalid';
    }
}