<?php

namespace ValueObjects\Tests\Web;

use ValueObjects\Exception\Web\EmailAddressInvalidException;
use ValueObjects\Web\EmailAddress;

class EmailAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value)
    {
        $valueObject = new EmailAddress($value);
        $this->assertSame($value, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'Simple email' => ['email@domain.com'],
            'Email contains dot in the address field' => ['firstname.lastname@domain.com'],
            'Email contains dot with subdomain' => ['email@subdomain.domain.com'],
            'Plus sign is considered valid character' => ['firstname+lastname@domain.com'],
            'Square bracket around IP address is considered valid' => ['email@[123.123.123.123]'],
            'Quotes around email is considered valid' => ['"email"@domain.com'],
            'Digits in address are valid' => ['1234567890@domain.com'],
            'Dash in domain name is valid' => ['email@domain-one.com'],
            'Underscore in the address field is valid' => ['_______@domain.com'],
            '.name is valid Top Level Domain name' => ['email@domain.name'],
            'Dot in Top Level Domain name also considered valid' => ['email@domain.co.jp'],
            'Dash in address field is valid' => ['firstname-lastname@domain.com'],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(EmailAddressInvalidException::class);
        new EmailAddress($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Missing @ sign and domain' => ['plainaddress'],
            'Garbage' => ['#@%^%#$@#$@#.com'],
            'Missing username' => ['@domain.com'],
            'Encoded html within email is invalid' => ['Joe Smith <email@domain.com>'],
            'Missing @' => ['email.domain.com'],
            'Two @ sign' => ['email@domain@domain.com'],
            'Leading dot in address is not allowed' => ['.email@domain.com'],
            'Trailing dot in address is not allowed' => ['email.@domain.com'],
            'Multiple dots' => ['email..email@domain.com'],
            'Unicode char as address' => ['あいうえお@domain.com'],
            'Text followed email is not allowed' => ['email@domain.com (Joe Smith)'],
            'Missing top level domain (.com/.net/.org/etc)' => ['email@domain'],
            'Leading dash in front of domain is invalid' => ['email@-domain.com'],
            'Invalid IP format' => ['email@111.222.333.44444'],
            'Multiple dot in the domain portion is invalid' => ['email@domain..com'],
        );
    }
}