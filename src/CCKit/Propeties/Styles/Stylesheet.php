<?php

namespace CCKit\Propeties\Styles;

use CCKit\Utils\Iterator\IteratorItem;

/**
 *
 */
class Stylesheet extends IteratorItem
{

    /**
     * @var string
     */
    public $template = "stylesheet.twig";

    /**
     * @var bool
     */
    private $inline = false;

    /**
     * @var void
     */
    private $rel = "stylesheet";

    /**
     * @param bool $inline
     * @return $this
     */
    public function setInline($inline)
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInline()
    {
        return $this->inline;
    }

    /**
     * @param void $rel
     * @return $this
     */
    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    /**
     * @return void
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * @param string $data
     * @param bool $inline
     * @return $this
     */
    public static function create($data = null, $inline = false)
    {
        return parent::traitCreate($data, $inline);

    }

    /**
     * @param string $data
     * @param bool $inline
     */
    public function __construct($data = null, $inline = false)
    {
        parent::__construct($data)
        	->setInline($inline);
    }

    /**
     *
     */
    public function render()
    {
        $variables = $this->getVariables();
        $attributes = $this->getAttributes();

        if($this->isInline())
        	$variables->add('inline', $this->getValue());
        else
        	$attributes->add('href', $this->getValue());

        $attributes->add('rel', $this->getRel());

        return parent::render();
    }
}
