<?php

declare(strict_types=1);

namespace ValueObjects\Boolean;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Boolean\BooleanInvalidException;

class Boolean extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param boolean $value
     * @return boolean
     * @throws BooleanInvalidException
     */
    protected function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        if (is_null($filteredValue)) {
            throw new BooleanInvalidException($value);
        }

        return true;
    }

    protected function normalizeValue($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
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
