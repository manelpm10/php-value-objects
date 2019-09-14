<?php

namespace ValueObjects;

/**
 * Class Collection
 */
class Collection implements \Iterator
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var array
     */
    protected $elements = [];

    /**
     * @return mixed|null
     */
    public function first()
    {
        return $this->elements[0] ?? null;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->elements[$this->position];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->elements[$this->position]);
    }

    /**
     * @return array
     */
    public function value()
    {
        return $this->toArray();
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->elements);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $elements = [];
        foreach($this->elements as $element)
        {
            $elements[] = $element->value();
        }

        return $elements;
    }
}
