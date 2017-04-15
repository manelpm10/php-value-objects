<?php

namespace ValueObjects\Tests\Web;

use ValueObjects\Web\Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new Url($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Http url' => ['http://www.google.com'],
            'Https url' => ['https://github.com'],
            'Url with path' => ['https://github.com/javazac'],
            'Url with path and arguments' => ['https://github.com/javazac?param1=value1&param2=value2'],
            'Ssh url' => ['ssh://zkonopa@javazac.com'],
            'Mailto url' => ['mailto://zac@javazac.com?subject=testing%20testing'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException('\ValueObjects\Exception\Web\UrlInvalidException');
        new Url($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Empty string is not a valid url' => [''],
            'Url without protocol is not a valid url' => ['www.google.com'],
            'NOT-URL is not a valid url' => ['NOT-URL'],
        );
    }
}