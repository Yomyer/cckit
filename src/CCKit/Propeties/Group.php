<?php

namespace CCKit\Propeties;

use CCKit\Utils\Iterator\Iterator;
use CCKit\Elements\Rendered;

/**
 *
 */
class Group extends Iterator
{

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     * @return $this
     */
    public static function createWithName($name = null)
    {
        return self::create()
        	->setName($name);

    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Rendered
     */
    public function first()
    {
        return parent::first();
    }

    /**
     * @return Rendered
     */
    public function last()
    {
        return parent::last();
    }

    /**
     * @param int $index
     * @return Rendered
     */
    public function eq($index)
    {
        return parent::eq($index);
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, array $arguments = array())
    {
        foreach($this->toArray() as $key => $element)
            if(method_exists($element, $name))
                call_user_func_array(array($element, $name), $arguments);
    }
}
