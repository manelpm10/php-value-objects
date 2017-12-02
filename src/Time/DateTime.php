<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\DateTimeInvalidException;

class DateTime extends AbstractValueObject
{
    /**
     * @var string
     */
    private $format;

    /**
     * @var Year
     */
    private $year;

    /**
     * @var Month
     */
    private $month;

    /**
     * @var Day
     */
    private $day;

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
    public function __construct($value, $format = 'Y-m-d H:i:s')
    {
        $this->format = $format;
        parent::__construct($value);
    }

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws DateTimeInvalidException
     */
    protected function guard($value)
    {
        $datetime = date_parse_from_format($this->format, $value);
        if (!empty($datetime['warning_count']) || !empty($datetime['error_count'])) {
            throw new DateTimeInvalidException($value);
        }

        $this->year = new Year($datetime['year']);
        $this->month = new Month($datetime['month']);
        $this->day = new Day($datetime['day']);
        $this->hour = new Hour($datetime['hour']);
        $this->minute = new Minute($datetime['minute']);
        $this->second = new Second($datetime['second']);

        return true;
    }

    /**
     * @return Year
     */
    public function getYear()
    {
        return clone $this->year;
    }

    /**
     * @return Month
     */
    public function getMonth()
    {
        return clone $this->month;
    }

    /**
     * @return Day
     */
    public function getDay()
    {
        return clone $this->day;
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
     * @return DateTime
     */
    public static function now($format = 'Y-m-d H:i:s')
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
        return ''.date($this->format, mktime(
            $this->hour->value(),
            $this->minute->value(),
            $this->second->value(),
            $this->month->value(),
            $this->day->value(),
            $this->year->value()
        ));
    }
}