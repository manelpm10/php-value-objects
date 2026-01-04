<?php

namespace ValueObjects\Tests\String;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\String\StringInvalidException;
use ValueObjects\String\StringLiteral;

class StringLiteralTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new StringLiteral($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'String text is a valid value' => ['This is valid!'],
            'String integer is a valid value' => ['1'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(StringInvalidException::class);
        new StringLiteral($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Float is not a valid string value' => [0.5],
            'Null is not a valid string value' => [null],
            'True is not a valid string value' => [true],
            'False is not a valid string value' => [false],
        );
    }
}
