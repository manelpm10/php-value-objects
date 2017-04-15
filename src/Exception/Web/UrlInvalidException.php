<?php

namespace ValueObjects\Exception\Web;

final class UrlInvalidException extends \InvalidArgumentException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid URL value <%s>', $value));

        $this->code = 'url_invalid';
    }
}