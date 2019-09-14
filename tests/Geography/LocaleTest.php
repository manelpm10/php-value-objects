<?php

namespace ValueObjects\Tests\Geography;

use ValueObjects\Geography\Locale;

class LocaleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Locale($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
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
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Geography\LocaleInvalidException');
        new Locale($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            '56 is not a valid language code' => ['56'],
            'Language name is not a valid language code' => ['spanish'],
        );
    }
}