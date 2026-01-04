<?php

namespace ValueObjects\Tests\Geography;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Geography\LatitudeInvalidException;
use ValueObjects\Geography\Latitude;

class LatitudeTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Latitude($value);
        $this->assertSame($value + 0, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Integer 0 is a valid latitude value' => [0],
            'Integer bigger than 0 is a valid latitude value' => [5],
            'Integer smaller than 0 is a valid latitude value' => [-5],
            'String integer is a valid latitude value' => ['1'],
            'String integer smaller than 0 is a valid latitude value' => ['-1'],
            'Float bigger than 0 is a valid latitude value' => [0.5],
            'Float bigger than 0 in string is a valid latitude value' => ['0.5'],
            'Float smaller than 0 is a valid latitude value' => [-0.5],
            'Float smaller than 0 in string is a valid latitude value' => ['-0.5'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(LatitudeInvalidException::class);
        new Latitude($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Integer bigger than 90 is not a valid latitude value' => [91],
            'Integer smaller than -90 is not a valid latitude value' => [-91],
            'Float bigger than 90 is not a valid latitude value' => [90.00001],
            'Float smaller than -90 is not a valid latitude value' => [-90.00001],
            'Null is not a valid latitude value' => [null],
            'True is not a valid latitude value' => [true],
            'False is not a valid latitude value' => [false],
        );
    }
}
