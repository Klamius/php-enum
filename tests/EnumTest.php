<?php

namespace Klamius\Enum\Tests;

use Klamius\Enum\Tests\Fixtures\FixtureEnum;

class EnumTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider invalidDataProvider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage is not part from Klamius\Enum\Tests\Fixtures\FixtureEnum class
     */
    public function testCreatingEnumWithNotExistingValue($value)
    {
        new FixtureEnum($value);
    }

    public function invalidDataProvider()
    {
        return array(
            array(null),
            array(123),
            array("abc")
        );
    }

    public function testCreatingEnumWithExistingValue()
    {
        $this->assertEquals(FixtureEnum::STRING, new FixtureEnum(FixtureEnum::STRING));
        $this->assertEquals((string)FixtureEnum::NUMBER, new FixtureEnum(FixtureEnum::NUMBER));
    }
}
