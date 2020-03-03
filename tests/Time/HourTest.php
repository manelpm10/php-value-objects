<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Exception\Time\HourInvalidException;
use ValueObjects\Time\Hour;

class HourTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Hour($value);
        $this->assertEquals($value, $valueObject->value());
    }

    public function validValuesProvider()
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
    public function testNotValidValues($value)
    {
        $this->setExpectedException(HourInvalidException::class);
        new Hour($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Negative hours are not valid' => [-1],
            'Number 24 is not a valid hour' => [24],
            'String is not a valid hour' => ['one'],
        );
    }
}