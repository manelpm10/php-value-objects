<?php

namespace ValueObjects\Tests\Geography;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Geography\LocaleInvalidException;
use ValueObjects\Geography\Locale;

class LocaleTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Locale($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Spanish language is valid' => ['es'],
            'French language is valid' => ['fr'],
            'Catalan language in spain country is valid' => ['ca_ES'],
            'German language in German country is valid' => ['de_DE'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(LocaleInvalidException::class);
        new Locale($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            '56 is not a valid language code' => ['56'],
            'Language name is not a valid language code' => ['spanish'],
        );
    }
}
