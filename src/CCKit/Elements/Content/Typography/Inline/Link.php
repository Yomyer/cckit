<?php

namespace CCKit\Elements\Content\Typography\Inline;

use CCKit\Elements\Content\Typography\Inline;

/**
 *
 */
class Link extends Inline
{

    /**
     * @var string
     */
    public $tag = "a";

    /**
     * @var void
     */
    private $href;

    /**
     * @var void
     */
    private $target;

    /**
     * @param void $href
     * @return $this
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * @return void
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param void $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return void
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param mixed $content
     * @param string $href
     * @param string $target
     * @return $this
     */
    public static function create($content = null, $href = null, $target = null)
    {
        return parent::traitCreate($content, $href, $target);

    }

    /**
     * @param mixed $content
     * @param string $href
     * @param string $target
     */
    public function __construct($content = null, $href = null, $target = null)
    {
        $this->setHref($href);
        $this->setTarget($target);

        parent::__construct($content);
    }

    /**
     *
     */
    public function onLoad()
    {
        if($this->getHref())
            $this->addAttribute('href', $this->getHref());

        if($this->getTarget())
            $this->addAttribute('target', $this->getTarget());
    }
}
