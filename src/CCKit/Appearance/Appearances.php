<?php

namespace CCKit\Appearance;

use CCKit\Utils\Iterator\Iterator;

/**
 *
 */
class Appearances extends Iterator
{

    /**
     * @var Appearance[]
     */
    private $aparences = [];

    /**
     * @param Appearance[] $aparences
     * @return $this
     */
    public function setAparences(array $aparences)
    {
        $this->aparences = $aparences;

        return $this;
    }

    /**
     * @return Appearance[]
     */
    public function getAparences()
    {
        return $this->aparences;
    }

    /**
     * @param string $name
     * @return AppearanceInterface
     */
    public function get($name)
    {
        return parent::get($name);
    }

    /**
     * @return AppearanceInterface[]
     */
    public function getAll()
    {
        return parent::getAll();
    }
}
