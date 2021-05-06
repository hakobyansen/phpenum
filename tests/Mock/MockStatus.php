<?php

namespace Tests\Mock;

use Enum\Enum;

class MockStatus extends Enum
{
    const ACTIVE   = 'active';
    const INACTIVE = 'inactive';
    const BLOCKED  = 'blocked';
}