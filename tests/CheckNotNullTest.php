<?php

namespace Tests;

class CheckNotNullTest extends TestCase
{

    private function mock()
    {
        $k = new \stdClass();
        $k->isTrue = true;
        $k->isFalse = false;
        $k->isNull = null;
        $k->isArray = 8;

        return $k;
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\NullPointerException
     */
    public function testShouldThrowErrorOnNull()
    {
        preconditions()->checkNotNull($this->mock()->isNull);
    }


    public function testShouldNotThrowErrorOnFalse()
    {
        $this->assertFalse(preconditions()->checkNotNull($this->mock()->isFalse, "Lorem ipsum with %s", 'parameter'));
    }


    public function testShouldPass()
    {
        $this->assertTrue(preconditions()->checkNotNull($this->mock()->isTrue));
        $this->assertEquals(8, preconditions()->checkNotNull($this->mock()->isArray));
    }

}
