<?php

declare(strict_types=1);

namespace ValueObjects\ArrayValueObject;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\ArrayValueObject\ArrayValueObjectInvalidException;

class ArrayValueObject extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param array $value
     * @return boolean
     * @throws ArrayValueObjectInvalidException
     */
    protected function guard($value)
    {
        foreach ($value as $key => $item) {
            if (is_array($item)) {
                $this->guard($item);

                return true;
            }

            if (!(is_scalar($item) || is_null($item))) {
                throw new ArrayValueObjectInvalidException($key);
            }
        }

        return true;
    }
}
