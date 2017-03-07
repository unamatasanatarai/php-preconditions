<?php

namespace Tests;

class CheckArgumentTest extends TestCase
{

    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IllegalArgumentException
     */
    public function testShouldThrowErrorCheckArgument()
    {
        $this->assertFalse(preconditions()->checkArgument(7 < 1));
    }


    /**
     * @expectedException        Unamatasanatarai\Preconditions\Exception\IllegalArgumentException
     * @expectedExceptionMessage The argument is invalid
     */
    public function testShouldThrowErrorWithMessage()
    {
        $this->assertFalse(preconditions()->checkArgument(7 < 1, 'The argument is invalid'));
    }


    public function testShouldPassCheckArgument()
    {
        $this->assertTrue(preconditions()->checkArgument(true));
        $this->assertEquals(15, preconditions()->checkArgument(15));
        $this->assertTrue(preconditions()->checkArgument(7 < 9));
    }
}
