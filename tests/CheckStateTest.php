<?php

namespace Tests;

class CheckStateTest extends TestCase
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
     * @expectedException Unamatasanatarai\Preconditions\Exception\IllegalStateException
     */
    public function testShouldThrowErrorOnNull()
    {
        preconditions()->checkState($this->mock()->isNull);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IllegalStateException
     * @expectedExceptionMessage Lorem ipsum with parameter
     */
    public function testShouldThrowErrorOnFalse()
    {
        preconditions()->checkState($this->mock()->isFalse, "Lorem ipsum with %s",
            'parameter');
    }

    public function testShouldPass()
    {
        $this->assertTrue(preconditions()->checkState($this->mock()->isTrue));
        $this->assertEquals(8, preconditions()->checkState($this->mock()->isArray));
    }

}
