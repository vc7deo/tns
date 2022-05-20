<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $trash
 * @property string|null $token
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'trash'], 'integer'],
            [['name', 'token'], 'string', 'max' => 255],
            ['symbol', 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Country Name',
            'status' => 'Status',
            'trash' => 'Trash',
            'token' => 'Token',
        ];
    }

}
