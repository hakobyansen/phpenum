<?php

namespace Enum;

use Enum\Helpers\ReflectionHelper;

abstract class Enum
{
    /**
     * @var ReflectionHelper
     */
    private ReflectionHelper $reflection;

    /**
     * @var array
     */
    private array $preferences;

    /**
     * Enum constructor.
     * @param array $preferences
     */
    public function __construct(array $preferences = [])
    {
        $this->reflection = new ReflectionHelper($this);
        $this->preferences = $preferences;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $lowKeys = $this->preferences['case_lower'] ?? true;
        $upKeys = $this->preferences['case_upper'] ?? false;

        if($lowKeys) {
            return array_change_key_case($this->reflection->getConstants(), CASE_LOWER);
        } elseif ($upKeys) {
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