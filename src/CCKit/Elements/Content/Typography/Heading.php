<?php

namespace CCKit\Elements\Content\Typography;

use CCKit\Elements\Content\Typography;
use CCKit\Elements\Content\Typography\Inline\Small;

/**
 *
 */
class Heading extends Typography
{

    /**
     * @var int
     */
    private $level = 1;

    /**
     * @param int $level
     * @return $this
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     *
     */
    public function onLoad()
    {
        $this->setTag(sprintf('h%d', $this->getLevel()));
    }

    /**
     * @param mixed $content
     * @param int $level
     */
    public function __construct($content = null, $level = 1)
    {
        $this->setLevel($level);

        parent::__construct($content);
    }

    /**
     * @param mixed $content
     * @param int $level
     * @return $this
     */
    public static function create($content = null, $level = 1)
    {
        return parent::traitCreate($content, $level);

    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function appendSmall($content)
    {
        parent::append(Small::create($content));

        return $this;
    }

    /**
     * @param Rendered|string $content
     * @return $this
     */
    public function prependSmall($content)
    {
        parent::prepend(Small::create($content));

        return $this;
    }
}
