<?php

namespace CCKit\Utils\Connectors\Symfony;

use CCKit\Elements\Rendered;

/**
 *
 */
class Response extends \Symfony\Component\HttpFoundation\Response
{

    /**
     * @param Rendered|string $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(&$content, $status = 200, array $headers = [])
    {
        $this->prepareContent($content);
        parent::__construct($content, $status, $headers);
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prepareContent($content)
    {
        if($content instanceof Rendered){
            //$this->content = $content->setService(new Service());
            $content->recursiveOnLoad();
        }


        return $this;
    }
}
