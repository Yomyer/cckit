<?php

namespace CCKit\Appearance\Typography;

use CCKit\Appearance\Appearance;
use CCKit\Appearance\AppearanceInterface;
use CCKit\Elements\Rendered;

/**
 *
 */
class Transformation extends Appearance implements AppearanceInterface
{

    /**
     * @var string You can use [null(default)|lowercase|uppercase|capitalize]
     */
    private $transform = null;

    /**
     * @var string
     */
    const UPPERCASE = "uppercase";

    /**
     * @var string
     */
    const LOWERCASE = "lowercase";

    /**
     * @var string
     */
    const CAPITALIZE = "capitalize";

    /**
     * @param string $transform
     * You can use [null(default)|lowercase|uppercase|capitalize]
     * @return $this
     */
    public function setTransform($transform)
    {
        $this->transform = $transform;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransform()
    {
        return $this->transform;
    }

    /**
     * @param Rendered $object
     */
    public function execute(Rendered $object)
    {
        if($this->getTransform())
            $object->addClass('text-'.$this->getTransform());
    }

    /**
     * You can use [null(default)|lowercase|uppercase|capitalize]
     * @param string $transform
     * @return $this
     */
    public static function create($transform = null)
    {
        return new static($transform);

    }

    /**
     * @param string $transform
     */
    public function __construct($transform = null)
    {
        $this->setTransform($transform);
    }
}
