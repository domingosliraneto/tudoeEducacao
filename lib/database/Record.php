<?php

namespace Lib\Database;

use PDO;
use PDOException;
use Exception;

/**
 * Class Record
 * @package Lib\Database
 * @author Luciano Tavernard
 */
abstract class Record
{
    private $database;
    protected $data;

    /**
     * Record constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $database = new Connection('sample');
        $this->database = $database->connection();

        if ($id) {
            $object = $this->find($id);

            if ($object) {
                $this->setData($object->getData());
            }
        }
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
       if (method_exists($this, 'set_'.$name)) {
           call_user_func(array($this, 'set_'.$name), $value);
       } else {
           if ($value === null) {
               unset($this->data[$name]);
           } else {
               $this->data[$name] = $value;
           }
       }
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (method_exists($this, 'get_'.$name)) {
            return call_user_func(array($this, 'get_'.$name));
        } else {
            return isset($this->data[$name]) ? $this->data[$name] : null;
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param array $fields
     * @return string
     */
    public function create($fields = [])
    {
        $sql = "INSERT INTO {$this->getEntity()}  ({$this->bindFields($fields)}) VALUES ({$this->bindParams($fields)})";
        $sth = $this->database->prepare($sql);

        try {
            $this->database->beginTransaction();

            $sth->execute($this->bindValues($fields));
            $id = $this->database->lastInsertId();

            $this->database->commit();
        } catch (PDOException $e) {

            $this->database->rollBack();

            $e->getMessage();
        }

        return $id;
    }

    /**
     * @param array $fields
     * @return bool
     */
    public function update($fields = [])
    {
        $sql = "UPDATE {$this->getEntity()}  SET {$this->bindUpdate($fields)} WHERE id = :id ";
        $sth = $this->database->prepare($sql);

        try {
            $this->database->beginTransaction();

            foreach ($this->bindValues($fields) as $key => $value) {
                $sth->bindParam($key, $value, PDO::PARAM_STR);
            }

            $sth->bindParam(':id', $this->data['id'], PDO::PARAM_INT);

            $sth->execute();

            $this->database->commit();

            return true;

        } catch (PDOException $e) {

            $this->database->rollBack();

            $e->getMessage();

            return false;
        }
    }

    /**
     * @param Where $where
     * @return bool
     * @throws Exception
     */
    public function delete(Where $where)
    {
        $sql = "DELETE FROM {$this->getEntity()}";

        if ($where) {
            $whereSQL = $where->dump();
            $sql .= " WHERE {$whereSQL}";
        }

        $sth = $this->database->prepare($sql);

        try {

            $this->database->beginTransaction();

            for ($i = 0; $i < count($where->getValues()); $i++) {
                $sth->bindParam(($i + 1), $where->getValues()[$i], PDO::PARAM_INT);
            }

            $sth->execute();

            $this->database->commit();

        } catch (PDOException $e) {

            $this->database->rollBack();

            $e->getMessage();

            return false;
        }

        return true;
    }

    /**
     * @param Where|null $where
     * @return array
     */
    public function all(Where $where = null)
    {
        $sql = "SELECT {$this->getFields()} FROM {$this->getEntity()}";

        if ($where) {
            $whereSQL = $where->dump();
            $sql .= " WHERE {$whereSQL}";
        }

        $sth = $this->database->prepare($sql);

        try {

            $this->database->beginTransaction();

            if ($where) {
                for ($i = 0; $i < count($where->getValues()); $i++) {
                    $sth->bindParam(($i + 1), $where->getValues()[$i], PDO::PARAM_INT|PDO::PARAM_STR);
                }
            }

            $sth->execute();

            $this->database->commit();

        } catch (PDOException $e) {
            $this->database->rollBack();
            $e->getMessage();
        }

        return $sth->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $sql = "SELECT {$this->getFields()} FROM {$this->getEntity()} WHERE id{$this->getEntity()} = :id LIMIT 1";
        $sth = $this->database->prepare($sql);

        try {

            $this->database->beginTransaction();

            $sth->bindParam(":id", $id, PDO::PARAM_INT);

            $sth->execute();

            $this->database->commit();


        } catch (PDOException $e) {
            $this->database->rollBack();
            $e->getMessage();
        }

        return $sth->fetchObject(get_class($this));
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function findBy($name, $value)
    {
        $sql = "SELECT {$this->getFields()} FROM {$this->getEntity()} WHERE {$name} = :{$name} LIMIT 1";
        $sth = $this->database->prepare($sql);

        try {

            $this->database->beginTransaction();

            $sth->bindParam(":{$name}", $value, PDO::PARAM_STR);

            $sth->execute();

            $this->database->commit();

        } catch (PDOException $e) {
            $this->database->rollBack();
            $e->getMessage();
        }

        return $sth->fetchObject(get_class($this));
    }

    /**
     * @param \Lib\Database\Where|null $where
     * @return int
     */
    public function count(Where $where = null)
    {
        $sql = "SELECT id FROM {$this->getEntity()}";

        if ($where) {
            $whereSQL = $where->dump();
            $sql .= " WHERE {$whereSQL}";
        }

        print $sql;

        $sth = $this->database->prepare($sql);

        try {

            $this->database->beginTransaction();

            if ($where) {
                for ($i = 0; $i < count($where->getValues()); $i++) {
                    $param = $where->getValues()[$i];
                    $sth->bindParam(($i + 1), $param, PDO::PARAM_INT|PDO::PARAM_STR);
                }
            }

            $sth->execute();

            $this->database->commit();

        } catch (PDOException $e) {
            $this->database->rollBack();
        }

        return $sth->rowCount();
    }

    /**
     * @return mixed
     */
    private function getEntity()
    {
        return $this->table;
    }

    /**
     * @return string
     */
    private function getFields()
    {
        return (!empty($this->fields)) ? implode(', ',array_values($this->fields)) : '*';
    }

    /**
     * @param array $fields
     * @return string
     */
    private function bindFields($fields = [])
    {
        return implode(', ', array_keys($fields));
    }

    /**
     * @param array $fields
     * @return string
     */
    private function bindParams($fields = [])
    {
        return ':'.implode(', :', array_keys($fields));
    }

    /**
     * @param array $fields
     * @return string
     */
    private function bindUpdate($fields = [])
    {
        $bindParam = ':'.implode('=:', array_keys($fields));
        $array = array_combine(array_keys($fields), explode('=', $bindParam));

        $sql = null;

        foreach($array as $key => $value){
            $sql .= $key.' = '.$value.', ';
        }

        return rtrim($sql, ', ');
    }

    /**
     * @param array $fields
     * @return array
     */
    private function bindValues($fields = [])
    {
        return array_combine(explode(', ', $this->bindParams($fields)), array_values($fields));
    }
}