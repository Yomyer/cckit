<?php

namespace CCKit\Elements\Content\Typography;

/**
 *
 */
class Abbreviation extends Inline
{

    /**
     * @var string
     */
    public $tag = "abbr";

    /**
     * @var bool
     */
    private $initialism;

    /**
     * @param bool $initialism
     * @return $this
     */
    public function setInitialism($initialism)
    {
        $this->initialism = $initialism;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInitialism()
    {
        return $this->initialism;
    }

    /**
     *
     */
    public function onLoad()
    {
        if($this->isInitialism())
            $this->addClass('initialism');
    }

    /**
     * @param mixed $content
     * @param string $title
     * @param bool $initialism
     * @return $this
     */
    public static function create($content = null, $title = null, $initialism = false)
    {
        return parent::traitCreate($content, $title, $initialism);

    }

    /**
     * @param mixed $content
     * @param string $title
     * @param bool $initialism
     */
    public function __construct($content = null, $title = null, $initialism = false)
    {
        $this->setInitialism($initialism)
            ->setTitle($title);

        parent::__construct($content);
    }
}
