<?php

declare(strict_types=1);

namespace ValueObjects\Tests\Boolean;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Boolean\BooleanInvalidException;
use ValueObjects\Boolean\Boolean;

final class BooleanTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $filteredValue): void
    {
        $valueObject = new Boolean($value);
        $this->assertSame($filteredValue, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Boolean true is a valid value' => [true, true],
            'Boolean false is a valid value' => [false, false],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(BooleanInvalidException::class);
        new Boolean($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Integer 1 is not a valid value' => [2],
            'Random string is not a valid value' => ['hello'],
            'String true is not a valid value' => ['true'],
            'Null is not a valid value' => [null],
        );
    }
}
