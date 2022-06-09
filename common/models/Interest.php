<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "interest".
 *
 * @property int $id
 * @property int $user_from
 * @property int $user_to
 * @property int $user_by
 * @property int|null $is_interested
 * @property int|null $sent_at
 */
class Interest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_from', 'user_to', 'user_by'], 'required'],
            [['user_from', 'user_to', 'user_by', 'is_interested', 'sent_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_from' => 'User From',
            'user_to' => 'User To',
            'user_by' => 'User By',
            'is_interested' => 'Is Interested',
            'sent_at' => 'Sent At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\InterestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\InterestQuery(get_called_class());
    }
}
