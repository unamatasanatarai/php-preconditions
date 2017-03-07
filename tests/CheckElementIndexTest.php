<?php

namespace Tests;

class CheckElementIndexTest extends TestCase
{

    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     */
    public function testShouldThrowErrorOnNegative()
    {
        preconditions()->checkElementIndex(-1, 2, 'Index out of bounds?');
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Index out of bounds?
     */
    public function testShouldThrowErrorOnOverflowWithMessage()
    {
        preconditions()->checkElementIndex(3, 2, 'Index out of bounds?');
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Zero on Empty
     */
    public function testShouldThrowErrorOnOverZeroSizeArray()
    {
        preconditions()->checkElementIndex(0, 0, 'Zero on Empty');
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Index (4) must be less than size (2)
     */
    public function testShouldThrowErrorWithDefaultMessage()
    {
        preconditions()->checkElementIndex(4, 2);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Index (-9) must not be negative
     */
    public function testShouldThrowErrorWithDefaultMessageOnNegative()
    {
        preconditions()->checkElementIndex(-9, 2);
    }


    public function testShouldPass()
    {
        $this->assertEquals(9, preconditions()->checkElementIndex(9, 10));
        $this->assertEquals(0, preconditions()->checkElementIndex(0, 1));
    }

}
