<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\DateInvalidException;

class Date extends AbstractValueObject
{
    private $format;
    private $year;
    private $month;
    private $day;

    /**
     * AbstractValueObject constructor.
     *
     * @param string $value
     * @param string $format
     */
    public function __construct($value, string $format = 'Y-m-d')
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

    public function format(): string
    {
        return $this->format;
    }

    public function getYear(): Year
    {
        return clone $this->year;
    }

    public function getMonth(): Month
    {
        return clone $this->month;
    }

    public function getDay(): Day
    {
        return clone $this->day;
    }

    public function equalsTo($otherDate): bool
    {
        /** @var self $otherDate */
        $datetimeOne = \DateTime::createFromFormat($this->format, $this->value);
        $datetimeTwo = \DateTime::createFromFormat($otherDate->format(), $otherDate->value());

        return $datetimeOne == $datetimeTwo;
    }

    public function greaterThan(Date $otherDate): bool
    {
        $datetimeOne = \DateTime::createFromFormat($this->format, $this->value);
        $datetimeTwo = \DateTime::createFromFormat($otherDate->format(), $otherDate->value());

        return $datetimeOne > $datetimeTwo;
    }

    public function greaterThanEquals(Date $otherDate): bool
    {
        $datetimeOne = \DateTime::createFromFormat($this->format, $this->value);
        $datetimeTwo = \DateTime::createFromFormat($otherDate->format(), $otherDate->value());

        return $datetimeOne >= $datetimeTwo;
    }

    public function lowerThan(Date $otherDate): bool
    {
        $datetimeOne = \DateTime::createFromFormat($this->format, $this->value);
        $datetimeTwo = \DateTime::createFromFormat($otherDate->format(), $otherDate->value());

        return $datetimeOne < $datetimeTwo;
    }

    public function lowerThanEquals(Date $otherDate): bool
    {
        $datetimeOne = \DateTime::createFromFormat($this->format, $this->value);
        $datetimeTwo = \DateTime::createFromFormat($otherDate->format(), $otherDate->value());

        return $datetimeOne <= $datetimeTwo;
    }

    public static function now(string $format = 'Y-m-d'): Date
    {
        return new static(date($format), $format);
    }

    protected function normalizeValue($value): string
    {
        return ''.date($this->format, mktime(0, 0, 0, $this->month->value(), $this->day->value(), $this->year->value()));
    }
}