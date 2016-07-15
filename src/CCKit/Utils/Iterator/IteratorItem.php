<?php

namespace CCKit\Utils\Iterator;

use CCKit\Elements\Rendered;
use CCKit\Propeties\Attributes;

/**
 *
 */
abstract class IteratorItem extends Rendered
{

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $key;

    /**
     * @var int
     */
    private $weight;

    /**
     * @param string $value
     * @return $this
     */
    public static function createWith($value = null)
    {
        return self::create()
        	->setValue($value);

    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param int $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function __construct($value = null)
    {
        $this->init()
        	->setValue($value)
        	->setAttributes(Attributes::create());

        return $this;
    }

    /**
     *
     */
    public function render()
    {
        $this->getVariables()
        	->add('attributes', $this->getAttributes());

        return $this->traitRender();
    }
}
