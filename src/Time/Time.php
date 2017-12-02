<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\TimeInvalidException;

class Time extends AbstractValueObject
{
    /**
     * @var string
     */
    private $format;

    /**
     * @var Hour
     */
    private $hour;

    /**
     * @var Minute
     */
    private $minute;

    /**
     * @var Second
     */
    private $second;

    /**
     * AbstractValueObject constructor.
     *
     * @param string $value
     * @param string $format
     */
    public function __construct($value, $format = 'H:i:s')
    {
        $this->format = $format;
        parent::__construct($value);
    }

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws TimeInvalidException
     */
    protected function guard($value)
    {
        $time = date_parse_from_format($this->format, $value);
        if (!empty($time['warning_count']) || !empty($time['error_count'])) {
            throw new TimeInvalidException($value);
        }

        $this->hour = new Hour($time['hour']);
        $this->minute = new Minute($time['minute']);
        $this->second = new Second($time['second']);

        return true;
    }


    /**
     * @return Hour
     */
    public function getHour()
    {
        return clone $this->hour;
    }

    /**
     * @return Minute
     */
    public function getMinute()
    {
        return clone $this->minute;
    }

    /**
     * @return Second
     */
    public function getSecond()
    {
        return clone $this->second;
    }

    /**
     * @var string $format
     *
     * @return Time
     */
    public static function now($format = 'H:i:s')
    {
        return new static(date($format), $format);
    }

    /**
     * Normalize the value.
     *
     * @param mixed $value
     * @return mixed
     */
    protected function normalizeValue($value)
    {
        return ''.date($this->format, mktime($this->hour->value(), $this->minute->value(), $this->second->value()));
    }
}