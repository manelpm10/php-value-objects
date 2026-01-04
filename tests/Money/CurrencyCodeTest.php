<?php

namespace ValueObjects\Tests\Money;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Money\CurrencyCodeInvalidException;
use ValueObjects\Money\CurrencyCode;

class CurrencyCodeTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new CurrencyCode($value);
        $this->assertSame(strtoupper($value), $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Lower case currency code is valid' => ['eur'],
            'Upper case currency code is valid' => ['EUR'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(CurrencyCodeInvalidException::class);
        new CurrencyCode($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'KKK is not a valid currency code' => ['KKK'],
            'Currency name is not a valid currency code' => ['Euro'],
        );
    }
}
