<?php

namespace ValueObjects\Tests\Web;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exception\Web\UrlInvalidException;
use ValueObjects\Web\Url;

class UrlTest extends TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value): void
    {
        $valueObject = new Url($value);
        $this->assertSame($value, $valueObject->value());
    }

    public static function validValuesProvider(): array
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
    public function testNotValidValues($value): void
    {
        $this->expectException(UrlInvalidException::class);
        new Url($value);
    }

    public static function notValidValuesProvider(): array
    {
        return array(
            'Empty string is not a valid url' => [''],
            'Url without protocol is not a valid url' => ['www.google.com'],
            'NOT-URL is not a valid url' => ['NOT-URL'],
        );
    }
}
