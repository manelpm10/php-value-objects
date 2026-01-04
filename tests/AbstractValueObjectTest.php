<?php

declare(strict_types=1);

namespace ValueObjects\Tests;

use PHPUnit\Framework\TestCase;
use ValueObjects\Number\Integer;
use ValueObjects\String\StringLiteral;

final class AbstractValueObjectTest extends TestCase
{
    /**
     * @dataProvider equalValueObjects
     */
    public function testObjectsAreEqual($first, $second): void
    {
        $this->assertTrue($first->equals($second));
    }

    public static function equalValueObjects(): array
    {
        return array(
            'Int' => [new Integer(1), new Integer(1)],
            'String' => [new StringLiteral('hello'), new StringLiteral('hello')],
        );
    }

    /**
     * @dataProvider differentValueObjects
     */
    public function testObjectsAreNotEqual($first, $second): void
    {
        $this->assertFalse($first->equals($second));
    }

    public static function differentValueObjects(): array
    {
        return array(
            'Int' => [new Integer(1), new Integer(2)],
            'String' => [new StringLiteral('hello'), new StringLiteral('world')],
            'Different Objects' => [new Integer(1), new StringLiteral('world')],
        );
    }
}
