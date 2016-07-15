<?php

namespace CCKit\Elements\Content\Typography;

use CCKit\Elements\Content\Typography;

/**
 *
 */
class Copy extends Typography
{

    /**
     * @var string
     */
    public $tag = "p";

    /**
     * @var bool
     */
    private $lead;

    /**
     * @param bool $lead
     * @return $this
     */
    public function setLead($lead)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLead()
    {
        return $this->lead;
    }

    /**
     * @param mixed $content
     * @param bool $lead
     */
    public function __construct($content = null, $lead = false)
    {
        $this->setLead($lead);

        parent::__construct($content);
    }

    /**
     * @param mixed $content
     * @param bool $lead
     * @return $this
     */
    public static function create($content = null, $lead = false)
    {
        return parent::traitCreate($content, $lead);

    }

    /**
     *
     */
    public function onLoad()
    {
        if($this->isLead())
            $this->addClass('lead');
    }
}
