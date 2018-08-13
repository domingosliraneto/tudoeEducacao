<?php

namespace Lib\GUI\Base;

/**
 * Class Box
 * @package Lib\GUI\Base
 * @author Luciano Tavernard
 */
class Box extends Element
{

    /**
     * Box constructor.
     * @param string $title
     * @param null $border
     * @param string $width
     * @param \Lib\GUI\Base\Element|null $element
     */
    public function __construct($title = 'sem título', $border = null, $width = 'col-md-6', Element $element = null)
    {
        parent::__construct("div");
        $this->addClass($width);

        $box = new Element("div");

        if ($border == 'blue') {
            $box->addClass('box box-primary');
        } else if ($border == 'red') {
            $box->addClass('box box-danger');
        } else if ($border == 'green') {
            $box->addClass('box box-success');
        } else if (is_null($border)) {
            $box->addClass('box box-default');
        }

        $this->addChild($box);

        $box_header = new Element("div");
        $box_header->addClass("box-header with-border");
        $box->addChild($box_header);

        $box_title = new Element('h3');
        $box_title->addClass("box-title");
        $box_title->addChild($title);
        $box_header->addChild($box_title);

        $box_inner = new Element("div");
        $box_inner->addClass("box-body");

        if ($element) {
            $box_inner->addChild($element);
        }

        $box->addChild($box_inner);
    }
}