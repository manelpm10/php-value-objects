<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\Year;

class YearTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Year($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Year 1 is valid' => [1],
            'Year 12001 is valid' => [12001],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\YearInvalidException');
        new Year($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Negative years are not valid' => [-1],
            'String is not a valid year' => ['one'],
        );
    }
}