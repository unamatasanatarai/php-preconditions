<?php

namespace Tests;

class FunctionalTest extends TestCase
{

    public function testShouldHaveAccessToPreconditions()
    {
        $this->assertEquals(get_class(preconditions()), \Unamatasanatarai\Preconditions\Preconditions::class);
    }
}
