<?php

namespace ValueObjects;

use function Lambdish\Phunctional\all;
use function Lambdish\Phunctional\reduce;
use function Lambdish\Phunctional\sort;
use ValueObjects\Exception\InvalidCollectionTypeException;

abstract class Collection implements \Iterator
{
    protected $position = 0;
    protected $elements = [];

    public function __construct(array $elements)
    {
        foreach ($elements as $element) {
            if (false === is_a($element, $this->type())) {
                throw new InvalidCollectionTypeException($element, $this->type());
            }
        }

        $this->elements = $elements;
    }

    public static function createEmpty()
    {
        return new static([]);
    }

    abstract protected function type(): string;

    public function first()
    {
        return $this->elements[0] ?? null;
    }

    public function last()
    {
        $lastElementIndex = $this->count() - 1;

        return $this->elements[$lastElementIndex] ?? null;
    }

    public function current()
    {
        return $this->elements[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->elements[$this->position]);
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function add($element): void
    {
        if (false === is_a($element, $this->type())) {
            throw new InvalidCollectionTypeException($element, $this->type());
        }

        $this->elements[] = $element;
    }

    public function extract(): self
    {
        $elements = $this->toArray();
        $this->clear();

        return new static($elements);
    }

    public function each(callable $fn): void
    {
        foreach ($this->elements as $key => $element) {
            $fn($element, $key);
        }
    }

    public function all(callable $predicate): bool
    {
        return all($predicate, $this->toArray());
    }

    public function sort(callable $criteria)
    {
        return new static(sort($criteria, $this->toArray()));
    }

    public function reduce(callable $fn, $initialValue)
    {
        return reduce($fn, $this->toArray(), $initialValue);
    }

    public function clear(): void
    {
        $this->elements = [];
    }

    public function toArray(): array
    {
        return $this->elements;
    }
}
