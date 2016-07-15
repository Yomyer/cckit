<?php

namespace CCKit\Elements\Structure;

use CCKit\Propeties\Contents\Columns;
use CCKit\Elements\Rendered;
use CCKit\Elements\Structure\Grid\Column;

/**
 *
 */
class Grid extends Rendered
{

    /**
     * @var int
     */
    private static $grid_columns = 12;

    /**
     * @var Columns
     */
    private $columns;

    /**
     * @var string
     */
    public $template = "structure/grid.twig";

    /**
     * @param int $gridColumns
     */
    public static function setGridColumns($gridColumns)
    {
        self::$grid_columns = $gridColumns;
    }

    /**
     * @return int
     */
    public static function getGridColumns()
    {
        return self::$grid_columns;
    }

    /**
     * @param Columns $columns
     * @return $this
     */
    public function setColumns(Columns $columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * @return Columns
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     *
     */
    public function onLoad()
    {
        $this->addClass('row');
    }

    /**
     * @param Column|string $column
     * @return $this
     */
    public function append($column)
    {
        if(!$column instanceof \CCKit\Elements\Structure\Grid\Column)
            throw new \CCKit\Exceptions\FatalErrorException(" Argument 1 passed to ".__METHOD__." must be an instance of CCKit\\Elements\\Structure\\Grid\\Column");


        parent::append($column);

        return $this;
    }

    /**
     * @param Column|string $column
     * @return $this
     */
    public function prepend($column)
    {
        parent::prepend($column);

        return $this;
    }

    /**
     * @param int $index
     * @param Column|string $column
     * @return $this
     */
    public function insertBefore($index, $column)
    {
        parent::insertBefore($index, $column);

        return $this;
    }

    /**
     * @param int $index
     * @param Column|string $column
     * @return $this
     */
    public function insertAfter($index, $column)
    {
        $this->getContent()->insertAfter($index,  $column);

        return $this;
    }
}
