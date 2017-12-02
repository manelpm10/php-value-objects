<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $format, $expected)
    {
        $valueObject = new Date($value, $format);
        $this->assertSame($expected, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Date "2007-12-31" is valid' => ['2007-12-31', 'Y-m-d', '2007-12-31'],
            'Date "2007-2-1" is valid and normalized according with format' => ['2007-2-1', 'Y-m-d', '2007-02-01'],
            'Date for leap-year is valid' => ['2020-02-29', 'Y-m-d', '2020-02-29'],
            'Date "2007-31-12" is valid for format "Y-d-m"' => ['2007-31-12', 'Y-d-m', '2007-31-12']
        );
    }

    public function testDefaultFormat()
    {
        $value = '2012-12-31';
        $valueObject = new Date($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function testNowDate()
    {
        $format = 'Y_d_m';
        $now = date($format);
        $this->assertSame($now, Date::now($format)->value());
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value, $format)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\DateInvalidException');
        new Date($value, $format);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Date and time string is not valid' => ['2007-12-31 00:00:00', 'Y-m-d'],
            'Date with day out for range is not valid' => ['2007-11-31', 'Y-m-d'],
            'Date with month out for range is not valid' => ['2007-13-31', 'Y-m-d'],
            'Date not according with format is not valid' => ['2007_12_31', 'Y-m-d'],
            '29 of febrary for not leap-year is not valid' => ['2019-02-29', 'Y-m-d']
        );
    }
}