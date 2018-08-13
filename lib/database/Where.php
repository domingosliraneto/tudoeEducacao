<?php

namespace Lib\Database;

/**
 * Class Where
 * @package Lib\Database
 * @author Luciano Tavernard
 */
class Where
{
    private $filters = [];
    private $operators = [];
    private $properties;
    private $values = [];

    /**
     * @param Filter $filter
     * @param string $operator
     */
    public function addFilter(Filter $filter, $operator = 'AND')
    {
        $this->filters[] = $filter;
        $this->operators[] = $operator;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getProperties($name)
    {
        return $this->properties[$name];
    }
    
    /**
     * @param $name
     * @param $value
     */
    public function setProperties($name, $value)
    {
        $this->properties[$name] = isset($value) ? $value : 'NULL';
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param $value
     */
    public function setValues($value)
    {
        $this->values[] = $value;
    }

    /**
     * @return string
     */
    public function dump()
    {
        if ($this->filters) {
            $where = '';
            foreach ($this->filters as $key => $value) {
                $operator = $this->operators[$key];
                if (!in_array($value->getValue(), $this->values)){
                    $this->setValues($value->getValue());
                }

                $where .= ' ' . $value->dump() . ' ' . $operator;
            }
            $return = substr($where, 0, strlen($where) - 4);
            return ltrim($return);
        }
    }
}