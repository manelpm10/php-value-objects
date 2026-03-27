<?php

declare(strict_types=1);

namespace ValueObjects\Tests\ArrayValueObject;

use stdClass;
use ValueObjects\ArrayValueObject\ArrayValueObject;
use ValueObjects\Exception\ArrayValueObject\ArrayValueObjectInvalidException;

final class ArrayValueObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validValuesProvider
     */
    public function testValidValues($value, $filteredValue)
    {
        $valueObject = new ArrayValueObject($value);
        $this->assertSame($filteredValue, $valueObject->value());
    }

    public function validValuesProvider()
    {
        return [
            'ArrayVO has all valid scalar or nullable values' => [
                [
                    'str' => 'bar',
                    'integer' => 1,
                    'float' => 1.0,
                    'boolean' => true,
                    'nullable' => null,
                    'sub_array' => [
                        'string' => 'bar',
                        'integer' => 1,
                        'float' => 1.0,
                        'boolean' => true,
                        'nullable' => null
                    ]
                ],
                [
                    'str' => 'bar',
                    'integer' => 1,
                    'float' => 1.0,
                    'boolean' => true,
                    'nullable' => null,
                    'sub_array' => [
                        'string' => 'bar',
                        'integer' => 1,
                        'float' => 1.0,
                        'boolean' => true,
                        'nullable' => null
                    ]
                ]
            ],
            'ArrayVO is empty' => [[], []]
        ];
    }

    /**
     * @dataProvider notValidValuesProvider
     */
    public function testNotValidValues($value)
    {
        $this->setExpectedException(ArrayValueObjectInvalidException::class);
        new ArrayValueObject($value);
    }

    public function notValidValuesProvider()
    {
        return [
            'Try to create ArrayVO with invalid value' => [
                ['aObj' => new stdClass()]
            ],
            'Try to create ArrayVO with invalid value in some sub array' => [
                [
                    'str' => 'bar',
                    'sub_array' => [
                        ['aObj' => new stdClass()]
                    ]
                ]
            ]
        ];
    }
}
