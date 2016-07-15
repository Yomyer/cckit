<?php

namespace CCKit\Appearance\Typography;

use CCKit\Appearance\Appearance;
use CCKit\Appearance\AppearanceInterface;
use CCKit\Elements\Rendered;

/**
 *
 */
class Alignment extends Appearance implements AppearanceInterface
{

    /**
     * @var string You can use [left(default)|center|right|justify|nowrap]
     */
    private $alignment = "left";

    /**
     * @var string
     */
    const LEFT = "left";

    /**
     * @var string
     */
    const RIGHT = "right";

    /**
     * @var string
     */
    const CENTER = "center";

    /**
     * @var string
     */
    const JUSTIFY = "justify";

    /**
     * @var string
     */
    const NOWRAP = "nowrap";

    /**
     * @param string $alignment
     * You can use [left(default)|center|right|justify|nowrap]
     * @return $this
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * @param Rendered $object
     */
    public function execute(Rendered $object)
    {
        if($this->getAlignment())
            $object->addClass('text-'.$this->getAlignment());
    }

    /**
     * You can use [left(default)|center|right|justify|nowrap]
     * @param string $alignment
     * @return $this
     */
    public static function create($alignment = "left")
    {
        return new static($alignment);

    }

    /**
     * @param string $alignment
     */
    public function __construct($alignment = "left")
    {
        $this->setAlignment($alignment);
    }
}
