<?php

namespace ValueObjects\Tests\Geography;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Geography\CountryCodeInvalidException;
use ValueObjects\Geography\CountryCode;

class CountryCodeTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new CountryCode($value);
        $this->assertSame(strtoupper($value), $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Lower case country code is valid' => ['es'],
            'Upper case country code is valid' => ['ES'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(CountryCodeInvalidException::class);
        new CountryCode($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'KK is not a valid country code' => ['KK'],
            'Country name is not a valid country code' => ['Spain'],
        );
    }
}
