<?php

namespace CCKit\Utils\Response;

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