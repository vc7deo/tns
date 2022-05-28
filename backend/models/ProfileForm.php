<?php
namespace backend\models;

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
    public $email;
    public $old_email;
    public $old_phone;
    public $username;
    public $package_id;
    public $expired_at;
    public $status;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name','last_name','phone','email'], 'trim'],
            [['first_name','last_name','phone','email','package_id','status'], 'required'],
            ['email', 'string', 'max' => 255],
            [['old_email','old_phone'],'safe'],
            ['email', 'unique',
            'targetClass' => '\common\models\User', 
            'message' => \Yii::t('app', 'This Email has already been taken'), 
            'when' => function ($model, $attribute) {
                return $this->email !== $this->old_email;
            },
            ],
            ['expired_at', 'required', 'when' => function ($model) {
                return $model->package_id > 1;
            }, 'whenClient' => "function (attribute, value) {
                return $('#profileform-package_id').val() > 1;
            }"
            ],
            ['phone', 'match', 'pattern' => '/^([0-9+]+)$/'],
            ['phone', 'match', 'pattern' => '/(?<!\()-|\+/','message' => 'Please enter phone number with country code'],
            ['phone', 'string', 'min' => 6, 'max' => 15, 'tooShort' => '{attribute} should be at least 6 digits' , 'tooLong' => '{attribute} should be at most 15 digits' ],
            ['phone', 'unique',
            'targetClass' => '\common\models\User', 
            'message' => \Yii::t('app', 'This phone has already been taken.'), 
            'when' => function ($model, $attribute) {
                return $this->phone !== $this->old_phone;
            },
            ],
        ];
    }
    public function attributeLabels()
    {
        return [
            'package_id' => 'Package',
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
        $user->email = $this->email;
        $user->package_id = $this->package_id;
        if($this->package_id == 1){
            $user->expired_at = null;
        }else{
            $user->expired_at = strtotime($this->expired_at);  
        }
        
        $user->status = $this->status;
        if($user->save(false)){
            return true;
        }
        return false;
    }

}
