<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $format, $expected)
    {
        $valueObject = new DateTime($value, $format);
        $this->assertSame($expected, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'DateTime "2007-12-31 23:59:59" is valid' => ['2007-12-31 23:59:59', 'Y-m-d H:i:s', '2007-12-31 23:59:59'],
            'DateTime "2007-2-1 01:02:03" is valid and normalized according with format' => ['2007-2-1 01:02:03', 'Y-m-d H:i:s', '2007-02-01 01:02:03'],
            'DateTime for leap-year is valid' => ['2020-02-29 00:00:00', 'Y-m-d H:i:s', '2020-02-29 00:00:00'],
            'DateTime "2007-31-12 03:30:28" is valid for format "Y-d-m H:i:s"' => ['2007-31-12 03:30:28', 'Y-d-m H:i:s', '2007-31-12 03:30:28']
        );
    }

    public function testDefaultFormat()
    {
        $value = '2012-12-31 12:25:32';
        $valueObject = new DateTime($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function testNowDateTime()
    {
        $format = 'Y_d_m H-i-s';
        $now = date($format);
        $this->assertSame($now, DateTime::now($format)->value());
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value, $format)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\DateTimeInvalidException');
        new DateTime($value, $format);
    }

    public function notValidValuesProvider()
    {
        return array(
            'DateTime with day out for range is not valid' => ['2007-11-31 00:00:00', 'Y-m-d H:i:s'],
            'DateTime with month out for range is not valid' => ['2007-13-31 00:00:00', 'Y-m-d H:i:s'],
            'DateTime with hour out for range is not valid' => ['2007-13-31 24:00:00', 'Y-m-d H:i:s'],
            'DateTime with minute out for range is not valid' => ['2007-13-31 00:60:00', 'Y-m-d H:i:s'],
            'DateTime with second out for range is not valid' => ['2007-13-31 00:00:60', 'Y-m-d H:i:s'],
            'DateTime not according with format is not valid' => ['2007_12_31 00:00:00', 'Y-m-d H_i_s'],
            '29 of febrary for not leap-year is not valid' => ['2019-02-29 00:00:00', 'Y-m-d H:i:s']
        );
    }
}