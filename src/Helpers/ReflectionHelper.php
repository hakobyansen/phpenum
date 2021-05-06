<?php

namespace Enum\Helpers;

use ReflectionClass;
use Enum\Enum;

class ReflectionHelper
{
    /**
     * @var Enum
     */
    private Enum $enum;

    /**
     * ReflectionHelper constructor.
     * @param Enum $enum
     */
    public function __construct(Enum $enum)
    {
        $this->enum = $enum;
    }

    /**
     * @return array
     */
    public function getConstants(): array
    {
        $reflectionClass = new ReflectionClass($this->enum);

        return $reflectionClass->getConstants();
    }
}