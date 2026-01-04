<?php

namespace ValueObjects;

abstract class AbstractValueObject
{
    protected mixed $value;

    public function __construct(mixed $value)
    {
        if (($this instanceof InterfaceNullable && is_null($value)) || $this->guard($value)) {
            $this->value = (is_null($value))? null : $this->normalizeValue($value);
            return true;
        }

        throw new \InvalidArgumentException(sprintf('Argument "%s" is invalid.', $value));
    }

    protected function normalizeValue(mixed $value): mixed
    {
        return $value;
    }

    public function value(): mixed
    {
        return $this->value;
    }

    /**
     * Return stringified value.
     *
     * @return string
     */
    public function __toString(): string
    {
        return '' . $this->value;
    }

    /**
     * Guard that value object is valid.
     *
     * @param mixed $value
     * @return boolean
     */
    protected abstract function guard(mixed $value): bool;

    public function equals($other): bool
    {
        return get_class($this) === get_class($other) && $this->value === $other->value;
    }
}