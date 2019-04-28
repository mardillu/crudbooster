<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/21/2019
 * Time: 8:52 PM
 */

namespace crocodicstudio\crudbooster\controllers\scaffolding\traits;


use crocodicstudio\crudbooster\controllers\scaffolding\singletons\ColumnSingleton;
use crocodicstudio\crudbooster\models\ColumnModel;

trait ColumnsBasic
{
    private $index = 0;

    private function name($label, $name = null)
    {
        return (!$name)?strtolower(Str::slug($label,'_')):$name;
    }

    /**
     * @param string $label_or_name
     */
    public function removeColumn($label_or_name)
    {
        columnSingleton()->removeColumn($label_or_name);
    }

    private function setDefaultModelValue(ColumnModel $model)
    {
        $model->setRequired(true);
        $model->setStyle(null);
        $model->setHelp(null);
        $model->setInputWidth(12);
        $model->setShowIndex(true);
        $model->setShowAdd(true);
        $model->setShowEdit(true);
        $model->setShowDetail(true);
        return $model;
    }

}