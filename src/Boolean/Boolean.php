<?php

declare(strict_types=1);

namespace ValueObjects\Boolean;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Boolean\BooleanInvalidException;

class Boolean extends AbstractValueObject
{
    /**
     * @throws BooleanInvalidException
     */
    protected function guard(mixed $value): bool
    {
        if ($value !== true && $value !== false) {
            throw new BooleanInvalidException($value);
        }

        return true;
    }

    public function isTrue()
    {
        return $this->value === true;
    }

    public function isFalse()
    {
        return $this->value === false;
    }
}
