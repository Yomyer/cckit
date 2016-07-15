<?php

namespace CCKit\Propeties;

use CCKit\Utils\Iterator\Iterator;

/**
 *
 */
class Attributes extends Iterator
{

    /**
     * @return string
     */
    public function join()
    {
        $return = [];

        foreach($this->getData() as $prop => $value)
            $return[] = $prop.'="'.(is_array($value) ? join(' ', $value) : $value).'"';

        return join(' ', $return);
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function addClass($class)
    {
        $this->merge(['class'=> $class]);

        return $this;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function removeClass($class)
    {
        $classes = (array)$this->get('class');

        if(($key = array_search($class, $classes)) !== false) {
            unset($classes[$key]);
        }

        $this->add('class', $classes);

        return $this;
    }

    /**
     * @param mixed $class
     * @param bool $toggle
     * @return $this
     */
    public function toggleClass($class, $toggle = null)
    {
        if(is_null($toggle))
            $toggle = $this->hasClass($class);
        else
            $toggle = !$toggle;

        if($toggle)
            $this->removeClass($class);
        else
            $this->addClass($class);

        return $this;
    }

    /**
     * @param mixed $class
     * @return bool
     */
    public function hasClass($class)
    {
        $classes = (array)$this->get('class');

        if(($key = array_search($class, $classes)) !== false)
            return true;

        return false;
    }
}
