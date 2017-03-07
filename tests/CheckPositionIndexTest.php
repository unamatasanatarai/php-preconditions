<?php

namespace Tests;

class CheckPositionIndexTest extends TestCase
{

    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     */
    public function testShouldThrowErrorOnNegative()
    {
        preconditions()->checkPositionIndex(-1, 2, 'Index out of bounds?');
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Index out of bounds?
     */
    public function testShouldThrowErrorOnOverflowWithMessage()
    {
        preconditions()->checkPositionIndex(3, 2, 'Index out of bounds?');
    }


    public function testShouldPassOnOverZeroSizeArray()
    {
        $this->assertEquals(0, preconditions()->checkPositionIndex(0, 0, 'Zero on Empty'));
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Position (4) must not be greater than size (2)
     */
    public function testShouldThrowErrorWithDefaultMessage()
    {
        preconditions()->checkPositionIndex(4, 2);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Position (-9) must not be negative
     */
    public function testShouldThrowErrorWithDefaultMessageOnNegative()
    {
        preconditions()->checkPositionIndex(-9, 2);
    }


    public function testShouldPass()
    {
        $this->assertEquals(9, preconditions()->checkPositionIndex(9, 10));
        $this->assertEquals(0, preconditions()->checkPositionIndex(0, 1));
    }

}
