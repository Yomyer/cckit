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
     * @var string
     */
    private $alignment = "left";

    /**
     * @param string $alignment
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
        $object->addClass('text-'.$this->getAlignment());
    }

    /**
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
