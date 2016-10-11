<?php

namespace ValueObjects\Tests\Number;

use ValueObjects\Number\Real;

class RealTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Real($value);
        $this->assertSame($value + 0, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Integer 0 is a valid real value' => [0],
            'Integer bigger than 0 is a valid real value' => [5],
            'Integer smaller than 0 is a valid real value' => [-5],
            'String integer is a valid real value' => ['1'],
            'String integer smaller than 0 is a valid real value' => ['-1'],
            'Float bigger than 0 is a valid real value' => [0.5],
            'Float bigger than 0 in string is a valid real value' => ['0.5'],
            'Float smaller than 0 is a valid real value' => [-0.5],
            'Float smaller than 0 in string is a valid real value' => ['-0.5'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Number\RealInvalidException');
        new Real($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Null is not a valid real value' => [null],
            'True is not a valid real value' => [true],
            'False is not a valid real value' => [false],
        );
    }
}