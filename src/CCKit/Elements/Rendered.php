<?php

namespace CCKit\Elements;

use CCKit\Propeties\Attributes;
use CCKit\Propeties\Contents;
use CCKit\Utils\Traits\Create;
use CCKit\Utils\Traits\Render;
use CCKit\Propeties\Group;
use CCKit\Utils\Find;

/**
 *
 */
abstract class Rendered
{
    use Create, 
		Render{
		Create::create as traitCreate;
		Render::render as traitRender;
	}

    /**
     * @var Attributes
     */
    private $attributes;

    /**
     * @var Contents
     */
    private $content;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var bool
     */
    private $hidden = false;

    /**
     * @var Rendered
     */
    private $parent = null;

    /**
     * @param Attributes $attributes
     * @return $this
     */
    public function setAttributes(Attributes $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param Contents $content
     * @return $this
     */
    public function setContent(Contents $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Contents
     */
    public function getContent()
    {
        return $this->content;
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
     * @param bool $hidden
     * @return $this
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    /**
     * @param Rendered $parent
     * @return $this
     */
    public function setParent(Rendered $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Rendered
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $content
     * @return $this
     */
    public function __construct($content = null)
    {
        $this->init();
        $contents = Contents::create()->setElement($this);
        if($content)
            $contents->setContents(is_array($content) ? $content : array($content));

        $this->setAttributes(Attributes::create());
        $this->setContent($contents);

        return $this;
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function append($content)
    {
        $this->getContent()->append($content);

        return $this;
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prepend($content)
    {
        $this->getContent()->prepend($content);

        return $this;
    }

    /**
     * @param mixed $content
     * @return $this
     */
    public static function create($content = null)
    {
        return self::traitCreate($content);

    }

    /**
     *
     */
    public function render()
    {
        $this->getVariables()
        	->add('attributes', $this->getAttributes())
        	->add('content', $this->getContent());

        $this->toggleClass('hidden', $this->isHidden());

        return $this->traitRender();
    }

    /**
     * @param int $index
     * @param Render|string $content
     * @return $this
     */
    public function insertBefore($index, $content)
    {
        $this->getContent()->insertBefore($index,  $content);

        return $this;
    }

    /**
     * @param int $index
     * @param Render|string $content
     * @return $this
     */
    public function insertAfter($index, $content)
    {
        $this->getContent()->insertAfter($index,  $content);

        return $this;
    }

    /**
     * @param Rendered $wrapper
     * @return $this
     */
    public function setWrap(Rendered $wrapper)
    {
        // TODO: implement here
        return $this;
    }

    /**
     * @param Rendered $wrapper
     * @return $this
     */
    public function setInnerWrap(Rendered $wrapper)
    {
        $wrapper->getContent()->setContents($this->getContent()->toArray());

        $this->getContent()->setContents([$wrapper]);

        return $this;
    }

    /**
     * @param string $class
     * @return $this
     */
    public function addClass($class)
    {
        $this->getAttributes()->addClass($class);

        return $this;
    }

    /**
     * @param array $classes
     * @return $this
     */
    public function mergeClass(array $classes)
    {
        $this->getAttributes()->merge($classes);

        return $this;
    }

    /**
     *
     */
    public function recursiveOnLoad()
    {
        $this->onLoad();

        if($this->getContent())
            foreach($this->getContent() as $content)
                if(method_exists($content, 'recursiveOnLoad'))
                    $content->recursiveOnLoad();
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function addAttribute($name, $value)
    {
        $this->getAttributes()->add($name, $value);

        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getAttribute($name)
    {
        $this->getAttributes()->get($name);
    }

    /**
     * @param string $class
     * @return $this
     */
    public function removeClass($class)
    {
        $this->getAttributes()->removeClass($class);

        return $this;
    }

    /**
     * @param string $class
     * @param bool $toggle
     * @return $this
     */
    public function toggleClass($class, $toggle = null)
    {
        $this->getAttributes()->toggleClass($class, $toggle);

        return $this;
    }

    /**
     * @param string $glue
     * @return $this
     */
    public function setGlue($glue = "\n")
    {
        $this->getContent()->setGlue($glue);

        return $this;
    }

    /**
     * @return $this
     */
    public function copy()
    {
        return unserialize(serialize($this));
    }

    /**
     * @param string $element
     * @return Group
     */
    public function find($element)
    {
        return Find::create($this, $element)->find();
    }

    /**
     * @param bool $force
     * @return $this
     */
    public function show($force = false)
    {
        $this->setHidden(false);

        if($force)
            $this->setDisplay(true);

        return $this;
    }

    /**
     * @param bool $force
     * @return $this
     */
    public function hide($force = false)
    {
        $this->setHidden(true);

        if($force)
            $this->setDisplay(false);

        return $this;
    }
}
