<?php

namespace ValueObjects\Tests\Time;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Time\DayInvalidException;
use ValueObjects\Time\Day;

class DayTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Day($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Day 1 is valid' => [1],
            'Day 31 is valid' => [31],
            'Day 01 is valid' => ['01'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(DayInvalidException::class);
        new Day($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Negative days are not valid' => [-1],
            'Number 32 is not a valid day' => [32],
            'String is not a valid day' => ['one'],
        );
    }
}
