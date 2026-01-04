<?php

namespace ValueObjects\Tests\Geography;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Geography\LongitudeInvalidException;
use ValueObjects\Geography\Longitude;

class LongitudeTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Longitude($value);
        $this->assertSame($value + 0, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Integer 0 is a valid longitude value' => [0],
            'Integer bigger than 0 is a valid longitude value' => [5],
            'Integer smaller than 0 is a valid longitude value' => [-5],
            'String integer is a valid longitude value' => ['1'],
            'String integer smaller than 0 is a valid longitude value' => ['-1'],
            'Float bigger than 0 is a valid longitude value' => [0.5],
            'Float bigger than 0 in string is a valid longitude value' => ['0.5'],
            'Float smaller than 0 is a valid longitude value' => [-0.5],
            'Float smaller than 0 in string is a valid longitude value' => ['-0.5'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(LongitudeInvalidException::class);
        new Longitude($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Integer bigger than 90 is not a valid longitude value' => [181],
            'Integer smaller than -90 is not a valid longitude value' => [-181],
            'Float bigger than 90 is not a valid longitude value' => [180.00001],
            'Float smaller than -90 is not a valid longitude value' => [-180.00001],
            'Null is not a valid longitude value' => [null],
            'True is not a valid longitude value' => [true],
            'False is not a valid longitude value' => [false],
        );
    }
}
