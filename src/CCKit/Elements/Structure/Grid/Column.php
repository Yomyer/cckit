<?php

namespace CCKit\Elements\Structure\Grid;

use CCKit\Elements\Standar;

/**
 *
 */
class Column extends Standar
{

    /**
     * @var int[]
     */
    private $columns = [];

    /**
     * @var int[]
     */
    private $offsets = [];

    /**
     * @var int[]
     */
    private $pulls = [];

    /**
     * @var int[]
     */
    private $pushes = [];

    /**
     * @param int[] $columns
     * @return $this
     */
    public function setColumns(array $columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param int[] $offsets
     * @return $this
     */
    public function setOffsets(array $offsets)
    {
        $this->offsets = $offsets;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getOffsets()
    {
        return $this->offsets;
    }

    /**
     * @param int[] $pulls
     * @return $this
     */
    public function setPulls(array $pulls)
    {
        $this->pulls = $pulls;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getPulls()
    {
        return $this->pulls;
    }

    /**
     * @param int[] $pushes
     * @return $this
     */
    public function setPushes(array $pushes)
    {
        $this->pushes = $pushes;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getPushes()
    {
        return $this->pushes;
    }

    /**
     * @param mixed $content
     * @param int[] $columns
     */
    public function __construct($content = null, array $columns = array())
    {
        $this->setColumns($columns);

        return parent::__construct($content);
    }

    /**
     * @param mixed $content
     * @param int[] $columns
     * @return $this
     */
    public static function create($content = null, array $columns = array())
    {
        return parent::traitCreate($content, $columns);

    }

    /**
     *
     */
    public function onLoad()
    {
        if(!$this->getColumns())
            $this->setColumns(['xs' => 12]);

        foreach($this->getColumns() as $prefix => $num_of_columns){
            $this->addClass(sprintf('col-%s-%d', $prefix, $num_of_columns));
        }

        foreach($this->getOffsets() as $prefix => $num_of_columns){
            $this->addClass(sprintf('col-%s-offset-%d', $prefix, $num_of_columns));
        }

        foreach($this->getPushes() as $prefix => $num_of_columns){
            $this->addClass(sprintf('col-%s-push-%d', $prefix, $num_of_columns));
        }

        foreach($this->getPulls() as $prefix => $num_of_columns){
            $this->addClass(sprintf('col-%s-pull-%d', $prefix, $num_of_columns));
        }
    }

    /**
     * @param int $num_of_columns
     * @param string $prefix
     * @return $this
     */
    public function setColumn($num_of_columns, $prefix = "md")
    {
        $this->columns[$prefix] = $num_of_columns;

        return $this;
    }

    /**
     * @param string $prefix
     * @return int
     */
    public function getColumn($prefix = "md")
    {
        return $this->columns[$prefix];
    }

    /**
     * @param int $num_of_columns
     * @param string $prefix
     * @return $this
     */
    public function setOffset($num_of_columns, $prefix = "md")
    {
        $this->offsets[$prefix] = $num_of_columns;

        return $this;
    }

    /**
     * @param string $prefix
     * @return int
     */
    public function getOffset($prefix = "md")
    {
        return $this->offsets[$prefix];
    }

    /**
     * @param int $num_of_columns
     * @param string $prefix
     * @return $this
     */
    public function setPull($num_of_columns, $prefix = "md")
    {
        $this->pulls[$prefix] = $num_of_columns;

        return $this;
    }

    /**
     * @param string $prefix
     * @return int
     */
    public function getPull($prefix = "md")
    {
        return $this->pulls[$prefix];
    }

    /**
     * @param int $num_of_columns
     * @param string $prefix
     * @return $this
     */
    public function setPush($num_of_columns, $prefix = "md")
    {
        $this->pushes[$prefix] = $num_of_columns;

        return $this;
    }

    /**
     * @param string $prefix
     * @return int
     */
    public function getPush($prefix = "md")
    {
        return $this->pushes[$prefix];
    }
}
