<?php

namespace ValueObjects\Tests\Time;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Time\MinuteInvalidException;
use ValueObjects\Time\Minute;

class MinuteTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Minute($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Minute 1 is valid' => [1],
            'Minute 59 is valid' => [59],
            'Minute 01 is valid' => ['01'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(MinuteInvalidException::class);
        new Minute($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Negative minutes are not valid' => [-1],
            'Number 60 is not a valid minute' => [60],
            'String is not a valid minute' => ['one'],
        );
    }
}
