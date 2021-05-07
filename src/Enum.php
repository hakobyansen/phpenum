<?php

namespace Enum;

use Enum\Helpers\ReflectionHelper;
use JetBrains\PhpStorm\Pure;

abstract class Enum
{
    /**
     * @var ReflectionHelper
     */
    private ReflectionHelper $reflection;

    /**
     * @var bool
     */
    private bool $caseLower;

    /**
     * @var bool
     */
    private bool $caseUpper;

    /**
     * Enum constructor.
     * @param bool $caseLower
     * @param bool $caseUpper
     */
    #[Pure]
    public function __construct(bool $caseLower = true, bool $caseUpper = false)
    {
        $this->reflection = new ReflectionHelper($this);
        $this->caseLower  = $caseLower;
        $this->caseUpper  = $caseUpper;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        if($this->caseLower) {
            return array_change_key_case($this->reflection->getConstants(), CASE_LOWER);
        } elseif ($this->caseUpper) {
            return array_change_key_case($this->reflection->getConstants(), CASE_UPPER);
        } else {
            return $this->reflection->getConstants();
        }
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasValue(string $value): bool
    {
        return in_array($value, $this->toArray());
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasKey(string $key): bool
    {
        return in_array($key, array_keys($this->toArray()));
    }
}