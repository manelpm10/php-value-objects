<?php

namespace ValueObjects\Identity;

use Ramsey\Uuid\Uuid as BaseUuid;
use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Identity\UuidInvalidException;

class Uuid extends AbstractValueObject
{
    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws UuidInvalidException
     */
    public function guard($value)
    {
        if (!BaseUuid::isValid($value)){
            throw new UuidInvalidException($value);
        }

        return true;
    }

    /**
     * Generate a new Uuid.
     */
    public static function generate()
    {
        return new Uuid(BaseUuid::uuid4());
    }
}