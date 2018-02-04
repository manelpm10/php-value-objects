<?php

namespace ValueObjects\Tests\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testCountElements()
    {
        $dummyObjectCollection = new DummyObjectCollection();
        $dummyObjectCollection->add(new DummyObject('Object 1'));
        $dummyObjectCollection->add(new DummyObject('Object 2'));
        $dummyObjectCollection->add(new DummyObject('Object 3'));

        $this->assertEquals(3, $dummyObjectCollection->count());
    }

    public function testEmptyCollection()
    {
        $dummyObjectCollection = new DummyObjectCollection();
        $this->assertTrue($dummyObjectCollection->isEmpty());

        $dummyObjectCollection->add(new DummyObject('Object 1'));
        $this->assertFalse($dummyObjectCollection->isEmpty());
    }

    public function testCollectionToArrayConversion()
    {
        $dummyObjectCollection = new DummyObjectCollection();
        $dummyObjectCollection->add(new DummyObject('Object 1'));
        $dummyObjectCollection->add(new DummyObject('Object 2'));
        $dummyObjectCollection->add(new DummyObject('Object 3'));

        $expected = ['Object 1', 'Object 2', 'Object 3'];
        $this->assertEquals($expected, $dummyObjectCollection->toArray());
        $this->assertEquals($expected, $dummyObjectCollection->value());
    }
}