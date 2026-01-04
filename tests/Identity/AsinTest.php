<?php

namespace ValueObjects\Tests\Identity;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Identity\AsinInvalidException;
use ValueObjects\Identity\Asin;

class AsinTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Asin($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            '10 chars alphanumeric is a valid value' => ['B01LYA9JTA'],
            '10 numbers is a valid value' => ['0123456789'],
            '10 alpha chars is a valid value' => ['ABCDEFGHIJ'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(AsinInvalidException::class);
        new Asin($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            '10 chars lower case alphanum is not a valid ASIN value' => ['b01lyA9jta'],
            'Integer is not a valid ASIN value' => [1],
            'Random string is not a valid ASIN value' => ['abcdefg'],
            'Null is not a valid ASIN value' => [null],
            'True is not a valid ASIN value' => [true],
            'False is not a valid ASIN value' => [false],
        );
    }
}
