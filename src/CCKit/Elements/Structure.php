<?php

namespace CCKit\Elements;

/**
 *
 */
class Structure extends Rendered
{

    /**
     * @var bool
     */
    private $fluid = false;

    /**
     * @param bool $fluid
     * @return $this
     */
    public function setFluid($fluid)
    {
        $this->fluid = $fluid;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFluid()
    {
        return $this->fluid;
    }

    /**
     *
     */
    public function onLoad()
    {
        $this->setInnerWrap(Standar::create()->addClass($this->isFluid() ? 'container-fluid' : 'container'));
    }
}
