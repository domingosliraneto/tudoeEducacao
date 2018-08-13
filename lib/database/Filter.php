<?php

namespace Lib\Database;

use Exception;

/**
 * Class Filter
 * @package Lib\Database
 * @author Luciano Tavernard
 */
class Filter
{
    private $column;
    private $operator;
    private $value;

    /**
     * Filter constructor.
     * @param $column
     * @param $operator
     * @param $value
     */
    public function __construct($column, $operator, $value)
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $this->stament($value);
    }

    /**
     * @return null|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function dump()
    {
        if ($this->operator($this->operator)) {
            return "{$this->column} {$this->operator} ?";
        } else {
            throw new Exception('Operador inválido');
        }
    }

    /**
     * @param $value
     * @return bool
     */
    private function operator($value)
    {
        $operators = array('=', '>', '<', '>=', '<=', '!=', '<>', 'IN', 'IS NOT');

        return (in_array($value, $operators)) ? true : false;
    }

    /**
     * @param $value
     * @return null|string
     */
    private function stament($value)
    {
        $result = null;

        if (is_string($value)) {
            $result = "{$value}";
        } else if (is_integer($value)) {
            $result = $value;
        } else if (is_null($value)) {
            $result = 'NULL';
        } else if (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
        } else {
            $result = $this->isArray($value);
        }

        return $result;
    }

    /**
     * @param $value
     * @return string
     */
    private function isArray($value) {
        $x = [];
        if (is_array($value)) {
            foreach ($value as $v) {
                $x[] = is_string($v) ? "'$v'" : $v;
            }

            return '('.implode(', ', $x).')';
        }
    }
}