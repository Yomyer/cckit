<?php

namespace CCKit\Elements\Structure;

use CCKit\Propeties\Metas;
use CCKit\Propeties\Javascripts;
use CCKit\Propeties\Stylesheets;
use CCKit\Elements\Rendered;

/**
 *
 */
class Page extends Rendered
{

    /**
     * @var string
     */
    public $template = "structure/page.twig";

    /**
     * @var Metas
     */
    private $metas;

    /**
     * @var Javascripts
     */
    private $javascripts;

    /**
     * @var Stylesheets
     */
    private $stylesheets;

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $contentFluid;

    /**
     * @param Metas $metas
     * @return $this
     */
    public function setMetas(Metas $metas)
    {
        $this->metas = $metas;

        return $this;
    }

    /**
     * @return Metas
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * @param Javascripts $javascripts
     * @return $this
     */
    public function setJavascripts(Javascripts $javascripts)
    {
        $this->javascripts = $javascripts;

        return $this;
    }

    /**
     * @return Javascripts
     */
    public function getJavascripts()
    {
        return $this->javascripts;
    }

    /**
     * @param Stylesheets $stylesheets
     * @return $this
     */
    public function setStylesheets(Stylesheets $stylesheets)
    {
        $this->stylesheets = $stylesheets;

        return $this;
    }

    /**
     * @return Stylesheets
     */
    public function getStylesheets()
    {
        return $this->stylesheets;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param bool $contentFluid
     * @return $this
     */
    public function setContentFluid($contentFluid)
    {
        $this->contentFluid = $contentFluid;

        return $this;
    }

    /**
     * @return bool
     */
    public function isContentFluid()
    {
        return $this->contentFluid;
    }

    /**
     * @param mixed $content
     * @param string $title
     */
    public function __construct($content = null, $title = null)
    {
        $this->setTitle($title)
            ->setMetas(Metas::create())
            ->setJavascripts(Javascripts::create())
            ->setStylesheets(Stylesheets::create());

        parent::__construct($content);
    }

    /**
     * @param mixed $content
     * @param string $title
     * @return $this
     */
    public static function create($content = null, $title = null)
    {
        return parent::traitCreate($content, $title);

    }

    /**
     *
     */
    public function onRender()
    {
        if(!is_null($this->isContentFluid()))
            foreach($this->getContent() as $content)
                if(method_exists($content, 'setFluid'))
                    $content->setFluid($this->isContentFluid());

        $this->getVariables()
        	->add('title', $this->getTitle())
        	->add('javascripts', $this->getJavascripts())
        	->add('stylesheets', $this->getStylesheets());
    }
}
