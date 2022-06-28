<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string $title
 * @property string $module
 * @property string $name
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'module', 'name'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 510],
            ['file', 'file', 'extensions' => 'jpg, png'],
            ['title', 'required' ,'on' => 'custom-only' ],
            ['value', 'required', 'when' => function ($model) {
                return $model->module == 'time';
            }, 'whenClient' => "function (attribute, value) {
                return $('#setting-16-module').val() == 'time';
            }"],
            ['value', 'date', 'format' => 'php:H:i', 'when' => function ($model) {
                return $model->module == 'time';
            }, 'whenClient' => "function (attribute, value) {
                return $('#setting-16-module').val() == 'time';
            }"],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Form',
        ];
    }

}
