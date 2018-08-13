<?php

namespace Lib\GUI\Base;

/**
 * Class Alert
 * @package Lib\GUI\Base
 * @author Luciano Tavernard
 */
class Alert extends Element
{
    /**
     * Alert constructor.
     * @param $type
     * @param $message
     */
    public function __construct($type, $message)
    {
        parent::__construct('div');

        $button = new Element('button');
        $button->addProperty('type', 'button');
        $button->addClass('close');
        $button->addProperty('data-dismiss', 'alert');
        $button->addChild('×');

        $h4 = new Element('h4');
        $ico = new Element('i');

        if ($type == 'error') {
            $this->addClass("alert alert-error alert-dismissible");
            $ico->addClass('icon fa fa-ban');

        } else if ($type == 'info') {
            $this->addClass("alert alert-info alert-dismissible");
            $ico->addClass('icon fa fa-info');

        } else if ($type == 'warning') {
            $this->addClass("alert alert-warning alert-dismissible");
            $ico->addClass('icon fa fa-warning');

        } else if ($type == 'success') {
            $this->addClass("alert alert-success alert-dismissible");
            $ico->addClass('icon fa fa-check');

        }

        $h4->addChild($ico);
        $h4->addChild(' Alert!');

        $this->addChild($button);
        $this->addChild($h4);
        $this->addChild($message);
    }

}