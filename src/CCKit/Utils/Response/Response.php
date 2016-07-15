<?php

namespace CCKit\Utils\Response;

use CCKit\Elements\Rendered;
use CCKit\Utils\Traits\Create;

/**
 *
 */
class Response
{
    use Create;

    /**
     * @var Rendered
     */
    private $content;

    /**
     * @var int
     */
    private $status;

    /**
     * @var array
     */
    private $header;

    /**
     * @param Rendered $content
     * @return $this
     */
    public function setContent(Rendered $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Rendered
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param array $header
     * @return $this
     */
    public function setHeader(array $header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param Rendered|string $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(&$content, $status = 200, array $headers = [])
    {
        $this->prepareContent($content)
            ->setContent($content)
            ->setHeader($headers)
            ->setStatus($status);
    }

    /**
     *
     */
    public function __toString()
    {
        return (string)$this->getContent();
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prepareContent($content)
    {
        if($content instanceof Rendered){

            $content->recursiveOnLoad();
        }

        return $this;
    }
}
