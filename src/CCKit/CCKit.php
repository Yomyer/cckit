<?php

namespace CCKit;

/**
 *
 */
class CCKit
{

    /**
     * @var mixed[]
     */
    private static $config = [];

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @param mixed[] $config
     */
    public static function setConfig(array $config)
    {
        self::$config = $config;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function getConfig($name)
    {
        if(isset(self::$config[$name]))
            return self::$config[$name];
    }
}
