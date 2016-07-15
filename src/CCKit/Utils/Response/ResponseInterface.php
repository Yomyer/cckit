<?php

namespace CCKit\Utils\Response;

/**
 *
 */
interface ResponseInterface
{
    /**
     *
     */
    public function __toString();

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prepareContent($content);

}