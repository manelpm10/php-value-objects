<?php

namespace ValueObjects\Tests\Number;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Number\RealInvalidException;
use ValueObjects\Number\Real;

class RealTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Real($value);
        $this->assertSame($value + 0, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Integer 0 is a valid real value' => [0],
            'Integer bigger than 0 is a valid real value' => [5],
            'Integer smaller than 0 is a valid real value' => [-5],
            'String integer is a valid real value' => ['1'],
            'String integer smaller than 0 is a valid real value' => ['-1'],
            'Float bigger than 0 is a valid real value' => [0.5],
            'Float bigger than 0 in string is a valid real value' => ['0.5'],
            'Float smaller than 0 is a valid real value' => [-0.5],
            'Float smaller than 0 in string is a valid real value' => ['-0.5'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(RealInvalidException::class);
        new Real($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Null is not a valid real value' => [null],
            'True is not a valid real value' => [true],
            'False is not a valid real value' => [false],
        );
    }
}
