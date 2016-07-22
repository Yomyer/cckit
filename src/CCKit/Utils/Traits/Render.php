<?php

namespace CCKit\Utils\Traits;

use CCKit\Propeties\Variables;
use CCKit\Utils\Response\ServiceInterface;

/**
 *
 */
trait Render
{

    /**
     * @var string
     */
    public $template = "default.twig";

    /**
     * @var string
     */
    public $tag = "div";

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var string
     */
    private static $path_cache = false;

    /**
     * @var \Twig_LoaderInterface
     */
    private $loader;

    /**
     * @var Variables
     */
    private $variables;

    /**
     * @var string
     */
    private $path_templates;

    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var bool
     */
    private $display = true;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @param \Twig_Environment $twig
     * @return $this
     */
    public function setTwig(\Twig_Environment $twig)
    {
        $this->twig = $twig;

        return $this;
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }

    /**
     * @param string $pathCache
     */
    public static function setPathCache($pathCache)
    {
        self::$path_cache = $pathCache;
    }

    /**
     * @return string
     */
    public static function getPathCache()
    {
        return self::$path_cache;
    }

    /**
     * @param \Twig_LoaderInterface $loader
     * @return $this
     */
    public function setLoader(\Twig_LoaderInterface $loader)
    {
        $this->loader = $loader;

        return $this;
    }

    /**
     * @return \Twig_LoaderInterface
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * @param Variables $variables
     * @return $this
     */
    public function setVariables(Variables $variables)
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * @return Variables
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param string $pathTemplates
     * @return $this
     */
    public function setPathTemplates($pathTemplates)
    {
        $this->path_templates = $pathTemplates;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathTemplates()
    {
        return $this->path_templates;
    }

    /**
     * @param ServiceInterface $service
     * @return $this
     */
    public function setService(ServiceInterface $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return ServiceInterface
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param bool $debug
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @param bool $display
     * @return $this
     */
    public function setDisplay($display)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisplay()
    {
        return $this->display;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->getVariables()->add('tag', $this->tag);

        $this->onRender();

        if($this->isDisplay())
            return $this->getTwig()->render($this->getTemplate(), $this->getVariables()->toArray());

        return "";
    }

    /**
     * @return $this
     */
    public function init()
    {
        if(!\CCKit\CCKit::getConfig('disable_cache'))
        	$this->setPathCache(\CCKit\CCKit::getConfig('cache').DIRECTORY_SEPARATOR.'twig');

        $this->setDebug(\CCKit\CCKit::getConfig('debug'));

        $this->setVariables(Variables::create());
        $this->setPathTemplates(realpath(dirname(__FILE__)."/../../../../resources/templates"));
        $this->setLoader(new \Twig_Loader_Filesystem($this->getPathTemplates()));

        $this->setTwig(new \Twig_Environment($this->getLoader(), [
            'cache' => $this->getPathCache(),
        	'debug' => $this->isDebug()
        ]));

        $this->getTwig()->addExtension(new \Twig_Extension_Debug());
        //\Symfony\Bridge\Twig\Extension\ProfileExtension

        $this->onInit();

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function addVariable($name, $value)
    {
        $this->getVariables()->add($name, $value);

        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getVariable($name)
    {
        $this->getVariables()->get($name);
    }

    /**
     * @param string $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     *
     */
    public function onInit()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function onRender()
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function onLoad()
    {
        // TODO: implement here
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
}
