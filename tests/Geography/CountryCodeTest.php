<?php

namespace ValueObjects\Tests\Geography;

use ValueObjects\Geography\CountryCode;

class CountryCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new CountryCode($value);
        $this->assertSame(strtoupper($value), $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Lower case country code is valid' => ['es'],
            'Upper case country code is valid' => ['ES'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Geography\CountryCodeInvalidException');
        new CountryCode($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'KK is not a valid country code' => ['KK'],
            'Country name is not a valid country code' => ['Spain'],
        );
    }
}