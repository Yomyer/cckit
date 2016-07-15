<?php

namespace CCKit\Elements\Content\Typography;

use CCKit\Elements\Content\Typography;

/**
 *
 */
class Blockquote extends Typography
{

    /**
     * @var string
     */
    public $tag = "blockquote";

    /**
     * @var bool
     */
    private $reverse = false;

    /**
     * @param bool $reverse
     * @return $this
     */
    public function setReverse($reverse)
    {
        $this->reverse = $reverse;

        return $this;
    }

    /**
     * @return bool
     */
    public function isReverse()
    {
        return $this->reverse;
    }

    /**
     *
     */
    public function onLoad()
    {
        if($this->isReverse())
            $this->addClass('blockquote-reverse');
    }
}
