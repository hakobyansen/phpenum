<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Mock\MockStatus;

class EnumTest extends TestCase
{
    private MockStatus $mockEnum;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockEnum = new MockStatus();
    }

    public function testAll()
    {
        $this->assertEquals([
            'active'   => 'active',
            'inactive' => 'inactive',
            'blocked'  => 'blocked'
        ], $this->mockEnum->toArray());
    }

    public function testHasKey()
    {
        $this->assertFalse($this->mockEnum->hasKey('dummy_key'));
        $this->assertTrue($this->mockEnum->hasKey('active'));
    }

    public function testHasValue()
    {
        $this->assertFalse($this->mockEnum->hasValue('Dummy Value'));
        $this->assertTrue($this->mockEnum->hasValue('blocked'));
    }
}