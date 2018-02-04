<?php

namespace ValueObjects\Tests\Collection;

use ValueObjects\Collection;

class DummyObjectCollection extends Collection
{
    /**
     * @param DummyObject $dummyObject
     */
    public function add(DummyObject $dummyObject)
    {
        $this->elements[] = $dummyObject;
    }
}