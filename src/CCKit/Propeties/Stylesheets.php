<?php

namespace CCKit\Propeties;

use CCKit\Utils\Iterator\Iterator;
use CCKit\Propeties\Styles\Stylesheet;

/**
 *
 */
class Stylesheets extends Iterator
{

    /**
     * @param string $name
     * @return Stylesheet
     */
    public function get($name)
    {
        return parent::get($name);
    }

    /**
     * @return Stylesheet[]
     */
    public function getAllStylesheets()
    {
        return parent::getAll();
    }

    /**
     * @param Stylesheet[] $styles
     * @return $this
     */
    public static function create(array $styles = [])
    {
        return new static($styles);

    }
}
