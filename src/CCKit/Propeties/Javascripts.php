<?php

namespace CCKit\Propeties;

use CCKit\Utils\Iterator\Iterator;
use CCKit\Propeties\Scripts\Javascript;

/**
 *
 */
class Javascripts extends Iterator
{

    /**
     * @param string $name
     * @return Javascript
     */
    public function get($name)
    {
        return parent::get($name);
    }

    /**
     * @return Javascript[]
     */
    public function getAllJavascripts()
    {
        return parent::getAll();
    }

    /**
     * @param Javascript[] $scripts
     * @return $this
     */
    public static function create(array $scripts = [])
    {
        return new static($scripts);

    }

    /**
     *
     */
    public function inHead()
    {
        $scripts = $this->getAllJavascripts();

        foreach ($scripts as $index => $script)
        	if(!$script->isInHead())
        		unset($scripts[$index]);

        return $this->renderArray($scripts);
    }

    /**
     *
     */
    public function inFooter()
    {
        $scripts = $this->getAllJavascripts();

        foreach ($scripts as $index => $script)
        	if($script->isInHead())
        		unset($scripts[$index]);

        return $this->renderArray($scripts);
    }
}
