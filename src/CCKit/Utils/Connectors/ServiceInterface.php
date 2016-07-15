<?php

namespace CCKit\Utils\Connectors;

use CCKit\Elements\Rendered;

/**
 *
 */
interface ServiceInterface
{
    /**
     * @param Rendered $content
     */
    public function execute(Rendered $content);

}