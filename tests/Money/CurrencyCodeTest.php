<?php

namespace ValueObjects\Tests\Money;

use ValueObjects\Money\CurrencyCode;

class CurrencyCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new CurrencyCode($value);
        $this->assertSame(strtoupper($value), $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Lower case currency code is valid' => ['eur'],
            'Upper case currency code is valid' => ['EUR'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Money\CurrencyCodeInvalidException');
        new CurrencyCode($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'KKK is not a valid currency code' => ['KKK'],
            'Currency name is not a valid currency code' => ['Euro'],
        );
    }
}