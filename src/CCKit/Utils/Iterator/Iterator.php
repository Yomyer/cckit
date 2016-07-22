<?php

namespace CCKit\Utils\Iterator;

use CCKit\Utils\Traits\Create;
use CCKit\Propeties\Group;

/**
 *
 */
abstract class Iterator implements \IteratorAggregate, \Countable
{
    use Create{
		Create::create as traitCreate;
	}

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string
     */
    public $glue = null;

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return $this
     */
    public static function create(array $data = [])
    {
        return self::traitCreate($data);

    }

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->setData($data);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if(!$this->count()) return '';

        return $this->join();
    }

    /**
     * @return array return (array)$this;
     */
    public function toArray()
    {
        if(!$this->count()) return [];

         return $this->getIterator()->getArrayCopy();
    }

    /**
     * @return string
     */
    public function join()
    {
        if(!$this->count()) return null;

        return implode($this->glue, $this->toArray());
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function append($data)
    {
        array_push($this->data, $data);

        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function prepend($data)
    {
        array_unshift($this->data, $data);

        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @param int $index
     * @param mixed $data
     * @return $this
     */
    public function insertBefore($index, $data)
    {
        array_splice($this->data, $index, 0, [$data]);

        return $this;
    }

    /**
     * @param int $index
     * @param mixed $data
     * @return $this
     */
    public function insertAfter($index, $data)
    {
        array_splice($this->data, $index+1, 0, [$data]);

        return $this;
    }

    /**
     * @param int|string $index
     * @return mixed
     */
    public function get($index)
    {
        if(isset($this->data[$index]))
            return $this->data[$index];
    }

    /**
     *
     */
    public function getAll()
    {
        return $this->toArray();
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function add($name, $value)
    {
        $this->data[$name] = $value;

        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function merge($data)
    {
        $this->data = array_merge_recursive($this->data, $data);

        return $this;
    }

    /**
     * @param array $array
     * @return string
     */
    public function renderArray(array $array)
    {
        return implode($this->glue, $array);
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function remove($name)
    {
        unset($this->data[$name]);

        return $this;
    }

    /**
     * @param mixed $name
     */
    public function has($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return current($this->data);
    }

    /**
     * @return mixed
     */
    public function last()
    {
        return end($this->data);
    }

    /**
     * @param int $index
     * @return $this
     */
    public function eq($index)
    {
        if($index < 0)
            $index = $this->count() + $index;

        return $this->get($index);
    }

    /**
     * @param callable $function
     * @return $this
     */
    public function each(callable $function)
    {
        foreach($this as $key => $item)
            call_user_func_array($function, [$key, $item]);

        return $this;
    }

    /**
     * @param int $index
     * @return Group
     */
    public function gt($index)
    {
        return Group::create(array_slice($this->toArray(), $index+1));
    }

    /**
     * @param int $index
     * @return Group
     */
    public function lt($index)
    {
        return Group::create(array_slice($this->toArray(), 0, $index));
    }

    /**
     * @return Group
     */
    public function odd()
    {
        $group = Group::create();

        foreach($this->toArray() as $index => $item)
            if($index & 1)
                $group->append($item);

        return $group;
    }

    /**
     * @return Group
     */
    public function even()
    {
        $group = Group::create();

        foreach($this->toArray() as $index => $item)
            if(!($index & 1))
                $group->append($item);

        return $group;
    }
}
