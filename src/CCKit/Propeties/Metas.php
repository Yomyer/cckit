<?php

namespace CCKit\Propeties;

use CCKit\Propeties\Metas\Meta;
use CCKit\Utils\Iterator\Iterator;

/**
 *
 */
class Metas extends Iterator
{

    /**
     * @var Meta[]
     */
    private $metas = [];

    /**
     * @param Meta[] $metas
     * @return $this
     */
    public function setMetas(array $metas)
    {
        $this->metas = $metas;

        return $this;
    }

    /**
     * @return Meta[]
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * @param string $name
     * @return Meta
     */
    public function get($name)
    {
        // TODO: implement here
        return null;
    }

    /**
     * @param Meta[] $metas
     * @return $this
     */
    public static function create(array $metas = [])
    {
        return new static($metas);

    }
}
