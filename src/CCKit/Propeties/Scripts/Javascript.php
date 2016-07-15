<?php

namespace CCKit\Propeties\Scripts;

use CCKit\Utils\Iterator\IteratorItem;

/**
 *
 */
class Javascript extends IteratorItem
{

    /**
     * @var string
     */
    public $template = "javascript.twig";

    /**
     * @var bool
     */
    private $inline = false;

    /**
     * @var bool
     */
    private $in_head = false;

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
     * @param bool $inHead
     * @return $this
     */
    public function setInHead($inHead)
    {
        $this->in_head = $inHead;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInHead()
    {
        return $this->in_head;
    }

    /**
     * @param string $data
     * @param bool $inline
     * @param bool $in_head
     */
    public function __construct($data = null, $inline = false, $in_head = false)
    {
        parent::__construct($data)
        	->setInline($inline)
        	->setInHead($in_head);
    }

    /**
     * @param string $data
     * @param bool $inline
     * @param bool $in_head
     * @return $this
     */
    public static function create($data = null, $inline = false, $in_head = false)
    {
        return parent::traitCreate($data, $inline, $in_head);

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
        	$attributes->add('src', $this->getValue());

        return parent::render();
    }
}
