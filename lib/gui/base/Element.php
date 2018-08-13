<?php

namespace Lib\GUI\Base;

/**
 * Class Element
 * @package Lib\GUI\Base
 * @author Luciano Tavernard
 */
class Element
{
    private $tagname;
    private $properties;
    private $children;
    private $tags = ['br, embed, hr, img, input, link, meta, source, track, wbr'];

    /**
     * Element constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->tagname = $name;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return isset($this->properties[$name]) ? $this->properties[$name] : null;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        ob_start();
        $this->show();
        $content = ob_get_contents();
        return $content;
    }

    /**
     * @param $child
     */
    public function addChild($child)
    {
        $this->children[] = $child;
    }

    /**
     * @param $name
     * @param $value
     */
    public function addProperty($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * @param $class
     */
    public function addClass($class)
    {
        $this->properties['class'] = $class;
    }

    /**
     *
     */
    public function show()
    {
        $this->open();

        if ($this->children) {
            foreach ($this->children as $child) {
                if (is_object($child)) {
                    $child->show();
                } else if ((is_string($child)) OR (is_numeric($child))) {
                    echo ucfirst($child);
                }
            }
        }

        $this->close();
    }

    /**
     *
     */
    private function open()
    {
        echo "<{$this->tagname}";

        if ($this->properties) {
            foreach ($this->properties as $name => $value) {
                if ($name != 'style' && is_scalar($value))
                    echo " {$name} = \"{$value}\"";
            }
        }

        if (in_array($this->tagname, $this->tags))
            echo "/>";
        else
            echo ">";
    }

    /**
     *
     */
    private function close()
    {
        if (!in_array($this->tagname, $this->tags))
            echo "</{$this->tagname}>";
    }
}