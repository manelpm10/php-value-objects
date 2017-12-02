<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\Minute;

class MinuteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Minute($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Minute 1 is valid' => [1],
            'Minute 59 is valid' => [59],
            'Minute 01 is valid' => ['01'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\MinuteInvalidException');
        new Minute($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Negative minutes are not valid' => [-1],
            'Number 60 is not a valid minute' => [60],
            'String is not a valid minute' => ['one'],
        );
    }
}