<?php

namespace CCKit\Appearance;

use CCKit\Utils\Traits\Create;

/**
 *
 */
abstract class Appearance
{
    use Create;

    /**
     * @var string
     */
    const NONE = null;

    /**
     *
     */
    public function __construct()
    {
    }
}
