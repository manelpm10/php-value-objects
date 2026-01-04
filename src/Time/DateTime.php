<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\DateTimeInvalidException;

class DateTime extends AbstractValueObject
{
    private string $format;
    private Year $year;
    private Month $month;
    private Day $day;
    private Hour $hour;
    private Minute $minute;
    private Second $second;

    public function __construct(string $value, string $format = 'Y-m-d H:i:s')
    {
        $this->format = $format;

        parent::__construct($value);
    }

    /**
     * @throws DateTimeInvalidException
     */
    protected function guard(mixed $value): bool
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

    public function getHour(): Hour
    {
        return clone $this->hour;
    }

    public function getMinute(): Minute
    {
        return clone $this->minute;
    }

    public function getSecond(): Second
    {
        return clone $this->second;
    }

    public static function now(string $format = 'Y-m-d H:i:s'): self
    {
        return new static(date($format), $format);
    }

    protected function normalizeValue(mixed $value): string
    {
        return date($this->format, mktime(
            $this->hour->value(),
            $this->minute->value(),
            $this->second->value(),
            $this->month->value(),
            $this->day->value(),
            $this->year->value()
        ));
    }
}