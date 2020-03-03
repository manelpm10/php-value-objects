<?php

namespace ValueObjects\Tests\Identity;

use ValueObjects\Exception\Identity\UuidInvalidException;
use ValueObjects\Identity\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Uuid($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Uuid 1 is a valid value' => ['e4eaaaf2-d142-11e1-b3e4-080027620cdd'],
            'Uuid 2 is a valid value' => ['7c401d91-3852-4818-985d-7e7b79f771c3'],
            'Uuid 3 is a valid value' => ['11a38b9a-b3da-360f-9353-a5a725514269'],
            'Uuid 4 is a valid value' => ['25769c6c-d34d-4bfe-ba98-e0ee856f3e7a'],
            'Uuid 5 is a valid value' => ['c4a760a8-dbcf-5254-a0d9-6a4474bd1b62'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(UuidInvalidException::class);
        new Uuid($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Float is not a valid uuid value' => [0.5],
            'Integer is not a valid uuid value' => ['0.5'],
            'Random string is not a valid uuid value' => ['abcdefg'],
            'Null is not a valid uuid value' => [null],
            'True is not a valid uuid value' => [true],
            'False is not a valid uuid value' => [false],
        );
    }

    public function testGenerateUuid()
    {
        $valueObject = Uuid::generate();
        $this->assertInstanceOf('ValueObjects\Identity\Uuid', $valueObject);
    }
}