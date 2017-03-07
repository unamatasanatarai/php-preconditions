<?php

namespace Tests;

class CheckPositionIndexesTest extends TestCase
{

    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Start Index (-1) must not be negative
     */
    public function testShouldThrowErrorOnNegativeStartIndex()
    {
        preconditions()->checkPositionIndexes(-1, 2, 888);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage End Index (-2) must not be negative
     */
    public function testShouldThrowErrorOnNegativeEndIndex()
    {
        preconditions()->checkPositionIndexes(1, -2, 888);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage Start Index (898) must not be greater than size (888)
     */
    public function testShouldThrowErrorOnLeftOutOfBounds()
    {
        preconditions()->checkPositionIndexes(898, 999, 888);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage End Index (999) must not be greater than size (888)
     */
    public function testShouldThrowErrorOnRightOutOfBounds()
    {
        preconditions()->checkPositionIndexes(698, 999, 888);
    }


    /**
     * @expectedException Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException
     * @expectedExceptionMessage End Index (4) must not be less than start index (698)
     */
    public function testShouldThrowErrorOnEndIndexSmallerThanStartIndex()
    {
        preconditions()->checkPositionIndexes(698, 4, 888);
    }


    public function testShouldPassOnOverZeroSizeArray()
    {
        $this->assertTrue(preconditions()->checkPositionIndexes(0, 0, 0));
    }


    public function testShouldPass()
    {
        $this->assertTrue(preconditions()->checkPositionIndexes(0, 1, 1));
        $this->assertTrue(preconditions()->checkPositionIndexes(9, 10, 10));
    }

}
