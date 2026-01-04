<?php

namespace ValueObjects\Tests\Time;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Time\HourInvalidException;
use ValueObjects\Time\Hour;

class HourTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Hour($value);
        $this->assertEquals($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
//            'Hour 0 is valid' => [1],
//            'Hour 23 is valid' => [23],
            'Hour 01 is valid' => ['01'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(HourInvalidException::class);
        new Hour($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Negative hours are not valid' => [-1],
            'Number 24 is not a valid hour' => [24],
            'String is not a valid hour' => ['one'],
        );
    }
}
