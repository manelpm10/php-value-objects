<?php

declare(strict_types=1);

namespace ValueObjects\Tests\Boolean;

use ValueObjects\Exception\Boolean\BooleanInvalidException;
use ValueObjects\Boolean\Boolean;

final class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $filteredValue)
    {
        $valueObject = new Boolean($value);
        $this->assertSame($filteredValue, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return array(
            'String true is a valid value' => ['true', true],
            'String 1 is a valid value' => ['1', true],
            'Empty String is a valid value' => ['', false],
            'Integer 0 is a valid value' => [0, false],
        );
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(BooleanInvalidException::class);
        new Boolean($value);
    }

    public function notValidValuesProvider()
    {
        return array(
            'Integer besides 1 and 0 is not a valid value' => [2],
            'Random string is not a valid value' => ['hello'],
        );
    }
}
