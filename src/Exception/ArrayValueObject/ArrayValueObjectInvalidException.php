<?php

declare(strict_types=1);

namespace ValueObjects\Exception\ArrayValueObject;

use InvalidArgumentException;

final class ArrayValueObjectInvalidException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(
            sprintf('Invalid array value, element with key <%s> has not have a primitive type', $value)
        );

        $this->code = 'array_element_invalid';
    }
}
