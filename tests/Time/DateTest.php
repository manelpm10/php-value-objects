<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Exception\Time\DateInvalidException;
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

    /**
     * @dataProvider equalsToProvider
     */
    public function testEqualsTo($dateOne, $formatOne, $dateTwo, $formatTwo, $expected): void
    {
        $valueObjectOne = new Date($dateOne, $formatOne);
        $valueObjectTwo = new Date($dateTwo, $formatTwo);

        $this->assertEquals($expected, $valueObjectOne->equalsTo($valueObjectTwo));
    }

    public function equalsToProvider(): array
    {
        return [
            'Equal date with same format'         => ['2012-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', true],
            'Not qual date with same format'      => ['2013-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', false],
            'Equal date with different format'    => ['2012-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', true],
            'Not qual date with different format' => ['2013-01-01', 'Y-m-d', '01-12-2012', 'd-m-Y', false],
        ];
    }

    /**
     * @dataProvider greaterThanProvider
     */
    public function testGreaterThan($dateOne, $formatOne, $dateTwo, $formatTwo, $expected): void
    {
        $valueObjectOne = new Date($dateOne, $formatOne);
        $valueObjectTwo = new Date($dateTwo, $formatTwo);

        $this->assertEquals($expected, $valueObjectOne->greaterThan($valueObjectTwo));
    }

    public function greaterThanProvider(): array
    {
        return [
            'Greater than date with same format'          => ['2013-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', true],
            'Equals than date with same format'           => ['2012-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', false],
            'Not greater than date with same format'      => ['2012-12-01', 'Y-m-d', '2013-12-01', 'Y-m-d', false],
            'Greater than date with different format'     => ['2013-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', true],
            'Equals than date with different format'      => ['2012-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', false],
            'Not greater than date with different format' => ['2012-12-01', 'Y-m-d', '01-12-2013', 'd-m-Y', false],
        ];
    }

    /**
     * @dataProvider greaterThanEqualsProvider
     */
    public function testGreaterThanEquals($dateOne, $formatOne, $dateTwo, $formatTwo, $expected): void
    {
        $valueObjectOne = new Date($dateOne, $formatOne);
        $valueObjectTwo = new Date($dateTwo, $formatTwo);

        $this->assertEquals($expected, $valueObjectOne->greaterThanEquals($valueObjectTwo));
    }

    public function greaterThanEqualsProvider(): array
    {
        return [
            'Greater than date with same format'          => ['2013-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', true],
            'Equals than date with same format'           => ['2012-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', true],
            'Not greater than date with same format'      => ['2012-12-01', 'Y-m-d', '2013-12-01', 'Y-m-d', false],
            'Greater than date with different format'     => ['2013-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', true],
            'Equals than date with different format'      => ['2012-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', true],
            'Not greater than date with different format' => ['2012-12-01', 'Y-m-d', '01-12-2013', 'd-m-Y', false],
        ];
    }

    /**
     * @dataProvider lowerThanProvider
     */
    public function testLowerThan($dateOne, $formatOne, $dateTwo, $formatTwo, $expected): void
    {
        $valueObjectOne = new Date($dateOne, $formatOne);
        $valueObjectTwo = new Date($dateTwo, $formatTwo);

        $this->assertEquals($expected, $valueObjectOne->lowerThan($valueObjectTwo));
    }

    public function lowerThanProvider(): array
    {
        return [
            'Lower than date with same format'          => ['2012-12-01', 'Y-m-d', '2013-12-01', 'Y-m-d', true],
            'Equals than date with same format'         => ['2012-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', false],
            'Not lower than date with same format'      => ['2013-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', false],
            'Lower than date with different format'     => ['01-12-2012', 'd-m-Y', '2013-12-01', 'Y-m-d', true],
            'Equals than date with different format'    => ['2012-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', false],
            'Not lower than date with different format' => ['01-12-2013', 'd-m-Y', '2012-12-01', 'Y-m-d', false],
        ];
    }

    /**
     * @dataProvider lowerThanEqualsProvider
     */
    public function testLowerThanEquals($dateOne, $formatOne, $dateTwo, $formatTwo, $expected): void
    {
        $valueObjectOne = new Date($dateOne, $formatOne);
        $valueObjectTwo = new Date($dateTwo, $formatTwo);

        $this->assertEquals($expected, $valueObjectOne->lowerThanEquals($valueObjectTwo));
    }

    public function lowerThanEqualsProvider(): array
    {
        return [
            'Lower than date with same format'          => ['2012-12-01', 'Y-m-d', '2013-12-01', 'Y-m-d', true],
            'Equals than date with same format'         => ['2012-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', true],
            'Not lower than date with same format'      => ['2013-12-01', 'Y-m-d', '2012-12-01', 'Y-m-d', false],
            'Lower than date with different format'     => ['01-12-2012', 'd-m-Y', '2013-12-01', 'Y-m-d', true],
            'Equals than date with different format'    => ['2012-12-01', 'Y-m-d', '01-12-2012', 'd-m-Y', true],
            'Not lower than date with different format' => ['01-12-2013', 'd-m-Y', '2012-12-01', 'Y-m-d', false],
        ];
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
        $this->setExpectedException(DateInvalidException::class);
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