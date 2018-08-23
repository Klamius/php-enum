<?php

namespace Klamius\Enum;

/**
 * Class Enum
 * @package Klamius\Enum
 */
abstract class Enum
{
    /**
     * @var mixed
     */
    protected $enumValue;

    /**
     * @var array
     */
    protected static $cache = array();

    /**
     * Enum constructor.
     * @param $enumValue
     */
    public function __construct($enumValue)
    {
        if (!self ::isPartFromTheClass($enumValue)) {
            throw new \InvalidArgumentException(
                sprintf('%s is not part from %s class', $enumValue, \get_called_class())
            );
        }

        $this->enumValue = $enumValue;
    }

    /**
     * @param $enumValue
     * @return bool
     */
    private function isPartFromTheClass($enumValue)
    {
        self::setCacheArray();
        return in_array($enumValue, static::$cache[\get_called_class()], true);
    }

    /**
     * @return void
     */
    private function setCacheArray()
    {
        if (!isset(static::$cache[\get_called_class()])) {
            $reflectionClass = new \ReflectionClass(\get_called_class());
            static::$cache[\get_called_class()] = $reflectionClass->getConstants();
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->enumValue;
    }
}
