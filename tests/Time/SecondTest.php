<?php

namespace ValueObjects\Tests\Time;

use ValueObjects\Time\Second;

class SecondTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Second($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Second 1 is valid' => [1],
            'Second 59 is valid' => [59],
            'Second 01 is valid' => ['01'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Time\SecondInvalidException');
        new Second($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Negative seconds are not valid' => [-1],
            'Number 60 is not a valid second' => [60],
            'String is not a valid second' => ['one'],
        );
    }
}