<?php

namespace CCKit\Exceptions;

/**
 *
 */
class FatalErrorException extends \ErrorException
{

    /**
     * @param string $message
     * @param int $traceOffset
     */
    public function __construct($message = "", $traceOffset = 0)
    {
        parent::__construct($message);
        $trace = $this->getTrace();
        $current = $trace[$traceOffset];
        $trace = array_slice($trace, $traceOffset+1);
        $this->setTrace($trace);

        if(isset($current['line']))
            $this->setLine($current['line']);

        if(isset($current['file']))
            $this->setFile($current['file']);
    }

    /**
     * @param void $trace
     */
    protected function setTrace($trace)
    {
        $traceReflector = new \ReflectionProperty('Exception','trace');
        $traceReflector->setAccessible(true);
        $traceReflector->setValue($this, $trace);
    }

    /**
     * @param void $line
     */
    protected function setLine($line)
    {
        $traceReflector = new \ReflectionProperty('Exception','line');
        $traceReflector->setAccessible(true);
        $traceReflector->setValue($this, $line);
    }

    /**
     * @param void $file
     */
    protected function setFile($file)
    {
        $traceReflector = new \ReflectionProperty('Exception','file');
        $traceReflector->setAccessible(true);
        $traceReflector->setValue($this, $file);
    }
}
