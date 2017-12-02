<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\DateInvalidException;

class Date extends AbstractValueObject
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
     * AbstractValueObject constructor.
     *
     * @param string $value
     * @param string $format
     */
    public function __construct($value, $format = 'Y-m-d')
    {
        $this->format = $format;
        parent::__construct($value);
    }

    /**
     * Guard that value object is valid.
     *
     * @param string $value
     * @return boolean
     * @throws DateInvalidException
     */
    protected function guard($value)
    {
        $date = date_parse_from_format($this->format, $value);
        if (!empty($date['warning_count']) || !empty($date['error_count'])) {
            throw new DateInvalidException($value);
        }

        $this->year = new Year($date['year']);
        $this->month = new Month($date['month']);
        $this->day = new Day($date['day']);

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
     * @var string $format
     *
     * @return Date
     */
    public static function now($format = 'Y-m-d')
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
        return ''.date($this->format, mktime(0, 0, 0, $this->month->value(), $this->day->value(), $this->year->value()));
    }
}