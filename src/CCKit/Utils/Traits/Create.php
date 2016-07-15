<?php

namespace CCKit\Utils\Traits;

/**
 *
 */
trait Create
{

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return $this
     */
    public static function create()
    {
        $rc = new \ReflectionClass(get_called_class());
        return $rc->newInstanceArgs(func_get_args());

    }
}
