<?php

namespace ValueObjects\Tests\Geography;

use ValueObjects\Exception\Geography\LanguageCodeInvalidException;
use ValueObjects\Geography\LanguageCode;

class LanguageCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new LanguageCode($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Lower case language code for spanish is valid' => ['es'],
            'Lower case language code for french is valid' => ['fr'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(LanguageCodeInvalidException::class);
        new LanguageCode($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            '56 is not a valid language code' => ['56'],
            'Language name is not a valid language code' => ['spanish'],
        );
    }
}