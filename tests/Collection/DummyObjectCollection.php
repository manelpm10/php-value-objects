<?php

namespace ValueObjects\Tests\Collection;

use ValueObjects\Collection;

class DummyObjectCollection extends Collection
{
    protected function type(): string
    {
        return DummyObject::class;
    }
}