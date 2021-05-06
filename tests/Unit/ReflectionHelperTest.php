<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Enum\Helpers\ReflectionHelper;
use Tests\Mock\MockStatus;

class ReflectionHelperTest extends TestCase
{
    private ReflectionHelper $helper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->helper = new ReflectionHelper(new MockStatus());
    }

    public function testConstToArray()
    {
        $this->assertEquals([
            'ACTIVE'   => 'active',
            'INACTIVE' => 'inactive',
            'BLOCKED'  => 'blocked'
        ], $this->helper->getConstants());
    }
}