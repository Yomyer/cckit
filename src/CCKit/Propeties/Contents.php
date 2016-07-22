<?php

namespace CCKit\Propeties;

use CCKit\Elements\Rendered;
use CCKit\Utils\Iterator\Iterator;

/**
 *
 */
class Contents extends Iterator
{

    /**
     * @var string
     */
    public $glue = "\n";

    /**
     * @var array
     */
    private $groups;

    /**
     * @var Rendered
     */
    private $element;

    /**
     * @param array $groups
     * @return $this
     */
    public function setGroups(array $groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Rendered $element
     * @return $this
     */
    public function setElement(Rendered $element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * @return Rendered
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct();
        $this->setContents($data);
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function append($content)
    {
        if($this->isRendered($content))
            $this->getGroup(get_class($content))->append($content);

        parent::append($content);

        return $this;
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prepend($content)
    {
        if($this->isRendered($content))
            $this->getGroup(get_class($content))->prepend($content);

        parent::prepend($content);

        return $this;
    }

    /**
     * @param int $index
     * @return Rendered
     */
    public function get($index)
    {
        return parent::get($index);
    }

    /**
     * @param int $index
     * @param Rendered|string $content
     * @return $this
     */
    public function insertBefore($index, $content)
    {
        if($this->isRendered($content))
            $this->getGroup(get_class($content))->insertBefore($index, $content);

        parent::insertBefore($index, $content);

        return $this;
    }

    /**
     * @param int $index
     * @param Rendered|string $content
     * @return $this
     */
    public function insertAfter($index, $content)
    {
        if($this->isRendered($content))
            $this->getGroup(get_class($content))->insertAfter($index, $content);

        parent::insertAfter($index, $content);

        return $this;
    }

    /**
     * @param Rendered[] $contents
     * @return $this
     */
    public function setContents(array $contents)
    {
        foreach($contents as $content)
            if($this->isRendered($content))
                $this->getGroup(get_class($content))->append($content);

        parent::setData($contents);

        return $this;
    }

    /**
     * @param string $glue
     * @return $this
     */
    public function setGlue($glue = "\n")
    {
        $this->glue = $glue;

        return $this;
    }

    /**
     * @param string $name
     * @return Group
     */
    public function getGroup($name)
    {
        if(isset($this->groups[$name]))
            return $this->groups[$name];

        return $this->groups[$name] = Group::createWithName($name);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function add($name, $value)
    {
        if($this->isRendered($value))
            $this->getGroup(get_class($value))->add($name, $value);

        parent::add($name, $value);

        return $this;
    }

    /**
     * @param mixed $content
     * @return bool
     */
    private function isRendered($content)
    {
        if(is_object($content)){
            return $content->setParent($this->getElement()) ? TRUE : FALSE;
        }

        return false;
    }
}
