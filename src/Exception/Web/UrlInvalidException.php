<?php

namespace ValueObjects\Exception\Web;

final class UrlInvalidException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        parent::__construct(sprintf('Invalid URL value <%s>', $value));

        $this->code = 'url_invalid';
    }
}