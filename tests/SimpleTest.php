<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function testAddition()
    {
        $this->assertEquals(8, 5+3);
    }
}