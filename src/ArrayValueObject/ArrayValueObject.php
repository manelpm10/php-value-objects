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
        foreach ($value as $key => $element) {
            if (is_array($element)) {
                $this->guard($element);

                return true;
            }

            if (!(is_scalar($element) || is_null($element))) {
                throw new ArrayValueObjectInvalidException($key);
            }
        }

        return true;
    }
}
