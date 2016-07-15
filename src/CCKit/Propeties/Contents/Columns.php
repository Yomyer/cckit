<?php

namespace CCKit\Propeties\Contents;

use CCKit\Propeties\Contents;
use CCKit\Elements\Structure\Grid\Column;

/**
 *
 */
class Columns extends Contents
{

    /**
     * @param Column $column
     * @return $this
     */
    public function append(Column $column)
    {
        parent::append($column);

        return $this;
    }

    /**
     * @param Column $columnt
     * @return $this
     */
    public function prepend(Column $columnt)
    {
        parent::prepend($column);

        return $this;
    }

    /**
     * @param int $index
     * @param Column $column
     * @return $this
     */
    public function insertBefore($index, Column $column)
    {
        parent::insertBefore($index, $column);

        return $this;
    }

    /**
     * @param int $index
     * @param Column $column
     * @return $this
     */
    public function insertAfter($index, Column $column)
    {
        parent::insertAfter($index, $column);

        return $this;
    }

    /**
     * @param Column[] $columns
     * @return $this
     */
    public function setColumns(array $columns)
    {
        parent::setData($columns);

        return $this;
    }
}
