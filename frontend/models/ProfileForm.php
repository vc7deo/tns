<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
/**
 * Profile form
 */
class ProfileForm extends Model
{
    public $first_name;
    public $last_name;
    public $phone;
    public $phone1;
    public $email;
    public $old_email;
    public $old_phone;
    public $old_phone1;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name','last_name','phone','phone1','email'], 'trim'],
            [['first_name','last_name','phone','email'], 'required'],
            ['email', 'string', 'max' => 255],
            [['old_email','old_phone'],'safe'],
            ['email', 'unique',
            'targetClass' => '\common\models\User', 
            'message' => \Yii::t('app', 'This Email has already been taken'), 
            'when' => function ($model, $attribute) {
                return $this->email !== $this->old_email;
            },
            ],
            ['phone', 'match', 'pattern' => '/^([0-9]+)$/'],
            ['phone', 'match', 'pattern' => '/(?<!\()-|/','message' => 'Please enter a valid phone number'],
            ['phone', 'string', 'min' => 6, 'max' => 15, 'tooShort' => '{attribute} should be at least 6 digits' , 'tooLong' => '{attribute} should be at most 15 digits' ],
            ['phone', 'unique',
            'targetClass' => '\common\models\User', 
            'message' => \Yii::t('app', 'This phone has already been taken.'), 
            'when' => function ($model, $attribute) {
                return $this->phone !== $this->old_phone;
            },
            ],
            ['phone1', 'match', 'pattern' => '/^([0-9]+)$/'],
            ['phone1', 'match', 'pattern' => '/(?<!\()-|/','message' => 'Please enter a valid phone number'],
            ['phone1', 'string', 'min' => 6, 'max' => 15, 'tooShort' => '{attribute} should be at least 6 digits' , 'tooLong' => '{attribute} should be at most 15 digits' ],
            ['phone1', 'unique',
            'targetClass' => '\common\models\User', 
            'message' => \Yii::t('app', 'This phone has already been taken.'), 
            'when' => function ($model, $attribute) {
                return $this->phone !== $this->old_phone;
            },
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function profile($user)
    {
        if (!$this->validate()) {
            return null;
        }
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->phone1 = $this->phone1;
        $user->email = $this->email;
        if($user->save(false)){
            return true;
        }
        return false;
    }

}
