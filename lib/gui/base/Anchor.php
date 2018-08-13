<?php

namespace Lib\GUI\Base;

/**
 * Class Anchor
 * @package Lib\GUI\Base
 * @author Luciano Tavernard
 */
class Anchor extends Element
{

    /**
     * Anchor constructor.
     * @param null $href
     * @param $value
     */
    public function __construct($href = null, $value)
    {
        parent::__construct('a');

        if ($href) {
            $this->addProperty('href', $href);
        } else {
            $this->addProperty('href', '#');
        }
        
        $this->addChild($value);
    }
}