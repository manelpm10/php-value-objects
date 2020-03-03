<?php

namespace ValueObjects\Tests\Number;

use ValueObjects\Exception\Number\IntegerInvalidException;
use ValueObjects\Number\Integer;

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Integer($value);
        $this->assertSame(intval($value), $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Integer 0 is a valid value' => [0],
            'Integer bigger than 0 is a valid value' => [5],
            'Integer smaller than 0 is a valid value' => [-5],
            'String integer is a valid value' => ['1'],
            'String integer smaller than 0 is a valid value' => ['-1'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(IntegerInvalidException::class);
        new Integer($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Float is not a valid integer' => [0.5],
            'Float in string is not a valid integer' => ['0.5'],
            'Null is not a valid integer' => [null],
            'True is not a valid integer value' => [true],
            'False is not a valid integer value' => [false],
        );
    }
}