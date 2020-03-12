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
            'Boolean true is a valid value' => [true, true],
            'Boolean false is a valid value' => [false, false],
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
            'Integer 1 is not a valid value' => [2],
            'Random string is not a valid value' => ['hello'],
            'String true is not a valid value' => ['true'],
            'Null is not a valid value' => [null],
        );
    }
}
