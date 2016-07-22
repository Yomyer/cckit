<?php

namespace CCKit\Utils;

use CCKit\Elements\Rendered;
use CCKit\Utils\Traits\Create;
use CCKit\Propeties\Group;

/**
 *
 */
class Find
{
    use Create{
		Create::create as traitCreate;
	}

    /**
     * @var string
     */
    private $element;

    /**
     * @var Rendered
     */
    private $rendered;

    /**
     * @param string $element
     * @return $this
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * @return string
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @param Rendered $rendered
     * @return $this
     */
    public function setRendered(Rendered $rendered)
    {
        $this->rendered = $rendered;

        return $this;
    }

    /**
     * @return Rendered
     */
    public function getRendered()
    {
        return $this->rendered;
    }

    /**
     * @param Rendered $rendered
     * @param string $element
     * @return $this
     */
    public static function create(Rendered $rendered, $element)
    {
        return self::traitCreate($rendered, $element);
    }

    /**
     * @param Rendered $rendered
     * @param mixed $element
     */
    public function __construct(Rendered $rendered, $element = null)
    {
        $this->setElement($element);
        $this->setRendered($rendered);
    }

    /**
     * @return Group
     */
    public function find()
    {
        return $this->getRendered()->getContent()->getGroup($this->getElement());
    }
}
