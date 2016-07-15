<?php

namespace CCKit\Elements;

use CCKit\Appearance\Appearances;
use CCKit\Appearance\AppearanceInterface;

/**
 *
 */
class Standar extends Rendered
{

    /**
     * @var Appearances
     */
    private $appearances;

    /**
     * @var string
     */
    private $title = null;

    /**
     * @param Appearances $appearances
     * @return $this
     */
    public function setAppearances(Appearances $appearances)
    {
        $this->appearances = $appearances;

        return $this;
    }

    /**
     * @return Appearances
     */
    public function getAppearances()
    {
        return $this->appearances;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     */
    public function onInit()
    {
        $this->setAppearances(Appearances::create());
    }

    /**
     * @param AppearanceInterface $appearance
     * @return $this
     */
    public function addAppearance(AppearanceInterface $appearance)
    {
        $this->getAppearances()->add(get_class($appearance), $appearance);

        return $this;
    }

    /**
     * @param string $name
     * @return AppearanceInterface
     */
    public function getAppearance($name)
    {
        return $this->getAppearances()->get($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasAppearance($name)
    {
        return $this->getAppearances()->has($name);
    }

    /**
     *
     */
    public function render()
    {
        if($this->getTitle())
            $this->addAttribute('title', $this->getTitle());

        foreach($this->getAppearances()->getAll() as $appearance){
            $appearance->execute($this);
        }

        return parent::render();
    }
}
