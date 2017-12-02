<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\Month;

class MonthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Month($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Month 1 is valid' => [1],
            'Month 2 is valid' => [2],
            'Month 3 is valid' => [3],
            'Month 4 is valid' => [4],
            'Month 5 is valid' => [5],
            'Month 6 is valid' => [6],
            'Month 7 is valid' => [7],
            'Month 8 is valid' => [8],
            'Month 9 is valid' => [9],
            'Month 10 is valid' => [10],
            'Month 11 is valid' => [11],
            'Month 12 is valid' => [12],
            'Month 01 is valid' => ['01'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\MonthInvalidException');
        new Month($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Negative months are not valid' => [-1],
            'Number 13 is not a valid month' => [13],
            'String is not a valid month' => ['one'],
        );
    }
}