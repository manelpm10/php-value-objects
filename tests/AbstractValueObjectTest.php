<?php

declare(strict_types=1);

namespace ValueObjects\Tests;

use ValueObjects\Number\Integer;
use ValueObjects\String\StringLiteral;

final class AbstractValueObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider equalValueObjects
     */
    public function testObjectsAreEqual($first, $second)
    {
        $this->assertTrue($first->equals($second));
    }

    public function equalValueObjects()
    {
        return array(
            'Int' => [new Integer(1), new Integer(1)],
            'String' => [new StringLiteral('hello'), new StringLiteral('hello')],
        );
    }

    /**
     * @dataProvider differentValueObjects
     */
    public function testObjectsAreNotEqual($first, $second)
    {
        $this->assertFalse($first->equals($second));
    }

    public function differentValueObjects()
    {
        return array(
            'Int' => [new Integer(1), new Integer(2)],
            'String' => [new StringLiteral('hello'), new StringLiteral('world')],
            'Different Objects' => [new Integer(1), new StringLiteral('world')],
        );
    }
}
