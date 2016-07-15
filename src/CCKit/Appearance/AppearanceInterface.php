<?php

namespace CCKit\Appearance;

use CCKit\Elements\Rendered;

/**
 *
 */
interface AppearanceInterface
{
    /**
     * @param Rendered $object
     */
    public function execute(Rendered $object);

}