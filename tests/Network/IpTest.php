<?php

namespace ValueObjects\Tests\Network;

use ValueObjects\Network\Ip;

class IpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validIpV4ValuesProvider
     */
    public function testValidIpV4Values($value)
    {
        $valueObject = new Ip($value);
        $this->assertEquals(Ip::IPV4, $valueObject->getVersion());
    }

    public function validIpV4ValuesProvider()
    {
        return array(
            'Current network is a valid IPv4' => ['0.0.0.0'],
            'Private network is a valid IPv4' => ['10.0.0.0'],
            'Shared Address Space is a valid IPv4' => ['100.64.0.0'],
            'Loopback is a valid IPv4' => ['127.0.0.0'],
            'Link-local is a valid IPv4' => ['169.254.0.0'],
            'Private network is a valid IPv4' => ['172.16.0.0'],
            'IP multicast is a valid IPv4' => ['224.0.0.0'],
            'Reserved range is a valid IPv4' => ['240.0.0.0'],
            'Broadcast is a valid IPv4' => ['255.255.255.255'],
        );
    }

    /**
     * @dataProvider validIpV6ValuesProvider
     */
    public function testValidIpV6Values($value)
    {
        $valueObject = new Ip($value);
        $this->assertEquals(Ip::IPV6, $valueObject->getVersion());
    }

    public function validIpV6ValuesProvider()
    {
        return array(
            'Current network is a valid IPv6' => ['::'],
            'Loopback is a valid IPv6' => ['::1'],
            'Three blocks valid IPv6' => ['2001:0DB8:C21A::'],
            'Long IPv6 valid' => ['2001:db8:3c4d:0015:0000:0000:1a2f:1a2b'],
        );
    }

}