<?php

namespace ValueObjects\Tests\String;

use ValueObjects\Exception\String\StringInvalidException;
use ValueObjects\String\StringLiteral;

class StringLiteralTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new StringLiteral($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'String text is a valid value' => ['This is valid!'],
            'String integer is a valid value' => ['1'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(StringInvalidException::class);
        new StringLiteral($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Float is not a valid string value' => [0.5],
            'Null is not a valid string value' => [null],
            'True is not a valid string value' => [true],
            'False is not a valid string value' => [false],
        );
    }
}