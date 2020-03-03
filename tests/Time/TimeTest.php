<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Exception\Time\TimeInvalidException;
use ValueObjects\Time\Time;

class TimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $format)
    {
        $valueObject = new Time($value, $format);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Time "23:59:59" is valid' => ['23:59:59', 'H:i:s'],
            'Time "00:00:00" is valid and normalized according with format' => ['00:00:00', 'H:i:s'],
            'Time "03/30/28" is valid for format "H/i/s"' => ['03/30/28', 'H/i/s']
        );
    }

    public function testDefaultFormat()
    {
        $value = '10:25:32';
        $valueObject = new Time($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function testNowTime()
    {
        $format = 'H:i:s';
        $now = date($format);
        $this->assertSame($now, Time::now($format)->value());
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value, $format)
    {
        $this->setExpectedException(TimeInvalidException::class);
        new Time($value, $format);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Time with hour out for range is not valid' => ['24:00:00', 'H:i:s'],
            'Time with minute out for range is not valid' => ['00:60:00', 'H:i:s'],
            'Time with second out for range is not valid' => ['00:00:60', 'H:i:s'],
            'Time not according with format is not valid' => ['00:00:00', 'H_i_s']
        );
    }
}