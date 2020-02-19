<?php

namespace ValueObjects\Tests\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testCountElements()
    {
        $array = [
            new DummyObject('Object 1'),
            new DummyObject('Object 2'),
            new DummyObject('Object 3')
        ];
        $dummyObjectCollection = new DummyObjectCollection($array);

        $this->assertEquals(3, $dummyObjectCollection->count());
    }

    public function testEmptyCollection()
    {
        $dummyObjectCollection = new DummyObjectCollection([]);
        $this->assertTrue($dummyObjectCollection->isEmpty());

        $dummyObjectCollection = new DummyObjectCollection([new DummyObject('Object 1')]);
        $this->assertFalse($dummyObjectCollection->isEmpty());
    }

    public function testCreateEmptyCollection()
    {
        $collection = DummyObjectCollection::createEmpty();

        $this->assertTrue($collection->isEmpty());
    }

    public function testAddElementsToCollection()
    {
        $collection = DummyObjectCollection::createEmpty();

        $numElements = rand(0, 10);
        for ($i = 0; $i < $numElements; $i++) {
            $collection->add(new DummyObject('Object '.$i));
        }

        $this->assertEquals($numElements, $collection->count());
    }

    public function testExtractElementsFromCollection()
    {
        $array = [
            new DummyObject('Object 1'),
            new DummyObject('Object 2'),
            new DummyObject('Object 3')
        ];
        $originalCollection = new DummyObjectCollection($array);
        $newCollection = $originalCollection->extract();

        $this->assertTrue($originalCollection->isEmpty());
        $this->assertEquals(3, $newCollection->count());
    }

    public function testEach()
    {
        $array = [
            new DummyObject('Object 0'),
            new DummyObject('Object 1'),
            new DummyObject('Object 2')
        ];
        $collection = new DummyObjectCollection($array);

        $collection->each(function(DummyObject $element, $i) {
            $this->assertEquals('Object '.$i, $element->value());
        });
    }

    public function testAll()
    {
        $array = [
            new DummyObject('Object 0'),
            new DummyObject('Object 1'),
            new DummyObject('Object 2')
        ];
        $collection = new DummyObjectCollection($array);

        $result = $collection->all(function(DummyObject $element, $i) {
            return 'Object ' . $i === $element->value();
        });

        $this->assertTrue($result);
    }

    public function testSort()
    {
        $array = [
            new DummyObject('Object 1'),
            new DummyObject('Object 2'),
            new DummyObject('Object 3')
        ];
        $collection = new DummyObjectCollection($array);

        $sortedCollection = $collection->sort(function(DummyObject $object, DummyObject $otherObject) {
            return $object->value() < $otherObject->value();
        });

        $this->assertEquals('Object 3', $sortedCollection->first()->value());
        $this->assertEquals('Object 1', $sortedCollection->last()->value());
    }

    public function testReduce()
    {
        $array = [
            new DummyObject('1'),
            new DummyObject('2'),
            new DummyObject('3')
        ];
        $collection = new DummyObjectCollection($array);

        $result = $collection->reduce(
            function ($aggregate, DummyObject $object): int {
                return $aggregate + $object->value();
            },
            0
        );

        $this->assertEquals(6, $result);
    }
}