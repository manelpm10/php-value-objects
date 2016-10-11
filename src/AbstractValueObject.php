<?php

namespace ValueObjects;

abstract class AbstractValueObject
{
    /**
     * @var mixed $value
     */
    protected $value;

    /**
     * AbstractValueObject constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (($this instanceof \InterfaceNullable && is_null($value)) || $this->guard($value)) {
            $this->value = $this->normalizeValue($value);
            return true;
        }

        throw new \InvalidArgumentException(sprintf('Argument "%s" is invalid.', $value));
    }

    /**
     * Normalize the value.
     *
     * @param mixed $value
     * @return mixed
     */
    protected function normalizeValue($value)
    {
        return $value;
    }

    /**
     * Return value.
     *
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Guard that value object is valid.
     *
     * @param mixed $value
     * @return boolean
     */
    public abstract function guard($value);
}