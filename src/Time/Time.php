<?php

namespace ValueObjects\Time;

use ValueObjects\AbstractValueObject;
use ValueObjects\Exception\Time\TimeInvalidException;

class Time extends AbstractValueObject
{
    private string $format;
    private Hour $hour;
    private Minute $minute;
    private Second $second;

    public function __construct(string $value, string $format = 'H:i:s')
    {
        $this->format = $format;
        parent::__construct($value);
    }

    /**
     * @throws TimeInvalidException
     */
    protected function guard(mixed $value): bool
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

    public static function now(string $format = 'H:i:s'): self
    {
        return new static(date($format), $format);
    }

    protected function normalizeValue(mixed $value): string
    {
        return date($this->format, mktime($this->hour->value(), $this->minute->value(), $this->second->value()));
    }
}