<?php

namespace ValueObjects\Tests\Identity;

use ValueObjects\Exception\Identity\AsinInvalidException;
use ValueObjects\Identity\Asin;

class AsinTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Asin($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            '10 chars alphanum is a valid value' => ['B01LYA9JTA'],
            '10 numbers is a valid value' => ['0123456789'],
            '10 alpha chars is a valid value' => ['ABCDEFGHIJ'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(AsinInvalidException::class);
        new Asin($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            '10 chars lower case alphanum is not a valid ASIN value' => ['b01lyA9jta'],
            'Interger is not a valid ASIN value' => [1],
            'Random string is not a valid ASIN value' => ['abcdefg'],
            'Null is not a valid ASIN value' => [null],
            'True is not a valid ASIN value' => [true],
            'False is not a valid ASIN value' => [false],
        );
    }
}