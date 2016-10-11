<?php

namespace ValueObjects\Tests\Geography;

use ValueObjects\Geography\Longitude;

class LongitudeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Longitude($value);
        $this->assertSame($value + 0, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Integer 0 is a valid longitude value' => [0],
            'Integer bigger than 0 is a valid longitude value' => [5],
            'Integer smaller than 0 is a valid longitude value' => [-5],
            'String integer is a valid longitude value' => ['1'],
            'String integer smaller than 0 is a valid longitude value' => ['-1'],
            'Float bigger than 0 is a valid longitude value' => [0.5],
            'Float bigger than 0 in string is a valid longitude value' => ['0.5'],
            'Float smaller than 0 is a valid longitude value' => [-0.5],
            'Float smaller than 0 in string is a valid longitude value' => ['-0.5'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Geography\LongitudeInvalidException');
        new Longitude($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Integer bigger than 90 is not a valid longitude value' => [181],
            'Integer smaller than -90 is not a valid longitude value' => [-181],
            'Float bigger than 90 is not a valid longitude value' => [180.00001],
            'Float smaller than -90 is not a valid longitude value' => [-180.00001],
            'Null is not a valid longitude value' => [null],
            'True is not a valid longitude value' => [true],
            'False is not a valid longitude value' => [false],
        );
    }
}