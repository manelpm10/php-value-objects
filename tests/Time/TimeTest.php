<?php

namespace ValueObjects\Tests\Time;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Time\TimeInvalidException;
use ValueObjects\Time\Time;

class TimeTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $format): void
    {
        $valueObject = new Time($value, $format);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Time "23:59:59" is valid' => ['23:59:59', 'H:i:s'],
            'Time "00:00:00" is valid and normalized according with format' => ['00:00:00', 'H:i:s'],
            'Time "03/30/28" is valid for format "H/i/s"' => ['03/30/28', 'H/i/s']
        );
    }

    public function testDefaultFormat(): void
    {
        $value = '10:25:32';
        $valueObject = new Time($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function testNowTime(): void
    {
        $format = 'H:i:s';
        $now = date($format);
        $this->assertSame($now, Time::now($format)->value());
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value, $format): void
    {
        $this->expectException(TimeInvalidException::class);
        new Time($value, $format);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Time with hour out for range is not valid' => ['24:00:00', 'H:i:s'],
            'Time with minute out for range is not valid' => ['00:60:00', 'H:i:s'],
            'Time with second out for range is not valid' => ['00:00:60', 'H:i:s'],
            'Time not according with format is not valid' => ['00:00:00', 'H_i_s']
        );
    }
}
