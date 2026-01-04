<?php

namespace ValueObjects\Tests\Geography;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Geography\LanguageCodeInvalidException;
use ValueObjects\Geography\LanguageCode;

class LanguageCodeTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new LanguageCode($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
    {
        return array(
            'Lower case language code for spanish is valid' => ['es'],
            'Lower case language code for french is valid' => ['fr'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value): void
    {
        $this->expectException(LanguageCodeInvalidException::class);
        new LanguageCode($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            '56 is not a valid language code' => ['56'],
            'Language name is not a valid language code' => ['spanish'],
        );
    }
}
