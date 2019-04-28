<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/26/2019
 * Time: 6:03 PM
 */

namespace crocodicstudio\crudbooster\controllers\scaffolding\singletons;


use crocodicstudio\crudbooster\models\ColumnModel;

class ColumnSingleton
{

    private $columns;
    private $joins;

    public function addJoin($data)
    {
        $this->joins[] = $data;
    }

    public function getJoin()
    {
        return $this->joins;
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    public function getIndexColumns()
    {
        $data = $this->columns;
        foreach($data as $i=>$item) {
            /** @var ColumnModel $item */
            if($item->getShowIndex() === false) {
                unset($data[$i]);
            }
        }
        return $data;
    }

    public function getAddEditColumns()
    {
        $data = $this->columns;
        foreach($data as $i=>$item) {
            /** @var ColumnModel $item */
            if($item->getShowIndex() === false) {
                unset($data[$i]);
            }

            if($item->getShowDetail() === false) {
                unset($data[$i]);
            }

        }
        return $data;
    }

    public function getEditColumns()
    {
        $data = $this->columns;
        foreach($data as $i=>$item) {
            /** @var ColumnModel $item */
            if($item->getShowEdit() === false) {
                unset($data[$i]);
            }
        }
        return $data;
    }

    public function getAddColumns()
    {
        $data = $this->columns;
        foreach($data as $i=>$item) {
            /** @var ColumnModel $item */
            if($item->getShowAdd() === false) {
                unset($data[$i]);
            }
        }
        return $data;
    }

    public function getDetailColumns()
    {
        $data = $this->columns;
        foreach($data as $i=>$item) {
            /** @var ColumnModel $item */
            if($item->getShowDetail() === false) {
                unset($data[$i]);
            }
        }
        return $data;
    }

    public function getAssignmentData()
    {
        $data = [];
        foreach($this->columns as $column) {
            /** @var ColumnModel $column */
            if(is_array($column->getValue())) {
                foreach($column->getValue() as $key=>$val) {
                    $data[$key] = $val;
                }
            }else{
                $data[$column->getField()] = $column->getValue();
            }
        }
        return $data;
    }

    public function removeColumn($label_or_name)
    {
        $data = $this->getColumns();
        foreach($data as $i=>$d)
        {
            /** @var ColumnModel $d */
            if($d->getLabel() == $label_or_name || $d->getName() == $label_or_name) {
                unset($data[$i]);
            }
        }
        $this->columns = $data;
    }

    public function getColumnNameOnly()
    {
        $result = [];
        foreach($this->columns as $column) {
            /** @var ColumnModel $column */
            $result[] = $column->getName();
        }
        return $result;
    }

    /**
     * @param int $index
     * @param ColumnModel $value
     */
    public function setColumn($index, ColumnModel $value)
    {
        $this->columns[$index] = $value;
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function getColumn($index) {
        return $this->columns[$index];
    }

    public function setColumnArray($index, $key, $values)
    {
        $this->columns[$index][$key][] = $values;
    }
}