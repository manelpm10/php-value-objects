<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\Day;

class DayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Day($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
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
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\DayInvalidException');
        new Day($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Negative days are not valid' => [-1],
            'Number 32 is not a valid day' => [32],
            'String is not a valid day' => ['one'],
        );
    }
}