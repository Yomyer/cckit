<?php

namespace CCKit\Propeties;

use CCKit\Utils\Iterator\Iterator;
use CCKit\Elements\Rendered;

/**
 *
 */
class Contents extends Iterator
{

    /**
     * @var string
     */
    public $glue = "\n";

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function append($content)
    {
        parent::append($content);

        return $this;
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prepend($content)
    {
        parent::prepend($content);

        return $this;
    }

    /**
     * @param int $index
     * @return Rendered
     */
    public function get($index)
    {
        return parent::get($index);
    }

    /**
     * @param int $index
     * @param Rendered|string $content
     * @return $this
     */
    public function insertBefore($index, $content)
    {
        parent::insertBefore($index, $content);

        return $this;
    }

    /**
     * @param int $index
     * @param Rendered|string $content
     * @return $this
     */
    public function insertAfter($index, $content)
    {
        parent::insertAfter($index, $content);

        return $this;
    }

    /**
     * @param Rendered[] $contents
     * @return $this
     */
    public function setContents(array $contents)
    {
        parent::setData($contents);

        return $this;
    }

    /**
     * @param string $glue
     * @return $this
     */
    public function setGlue($glue = "\n")
    {
        $this->glue = $glue;

        return $this;
    }
}
