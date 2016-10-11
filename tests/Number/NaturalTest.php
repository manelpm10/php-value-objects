<?php

namespace ValueObjects\Tests\Number;

use ValueObjects\Number\Natural;

class NaturalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Natural($value);
        $this->assertSame(intval($value), $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Integer bigger than 0 is a valid value' => [5],
            'String integer is a valid value' => ['1'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Number\NaturalInvalidException');
        new Natural($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Integer 0 is not a valid natural value' => [0],
            'Integer smaller than 0 is not a valid natural value' => [-5],
            'String integer smaller than 0 is not a valid natural value' => ['-1'],
            'Float is not a valid natural value' => [0.5],
            'Float in string is not a valid natural value' => ['0.5'],
            'Null is not a valid natural value' => [null],
            'True is not a valid natural value' => [true],
            'False is not a valid natural value' => [false],
        );
    }
}