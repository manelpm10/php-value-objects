<?php

namespace ValueObjects\Network;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Network\IpInvalidException;

class Ip extends AbstractValueObject
{
    const IPV4 = 'IPv4';
    const IPV6 = 'IPv6';

    /**
     * Guard that value object is valid.
     *
     * @param integer $value
     * @return boolean
     * @throws IpInvalidException
     */
    public function guard($value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_IP);
        if ($filteredValue === false) {
            throw new IpInvalidException($value);
        }

        return true;
    }

    /**
     * Returns the version (IPv4 or IPv6) of the ip address
     *
     * @return string
     */
    public function getVersion()
    {
        if ($this->isIpV4()) {
            return self::IPV4;
        }

        return self::IPV6;
    }

    /**
     * Checks if is IP v4.
     *
     * @return bool
     */
    public function isIpV4()
    {
        $isIPv4 = filter_var($this->value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        return (false !== $isIPv4);
    }

    /**
     * Checks if is IP v6.
     *
     * @return bool
     */
    public function isIpV6()
    {
        $isIPv6 = filter_var($this->value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
        return (false !== $isIPv6);
    }
}