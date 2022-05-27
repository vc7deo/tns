<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    //public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $gender;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // ['username', 'trim'],
            // ['username', 'required'],
            // ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            // ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['first_name','last_name','phone'],'trim'],
            [['first_name','last_name','phone','gender','dob'],'required'],
            ['phone', 'match', 'pattern' => '/^([0-9+]+)$/'],
            ['phone', 'match', 'pattern' => '/(?<!\()-|\+/','message' => 'Please enter phone number with country code'],
            ['phone', 'string', 'min' => 6, 'max' => 15, 'tooShort' => '{attribute} should be at least 6 digits' , 'tooLong' => '{attribute} should be at most 15 digits' ],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This phone has already been taken.'],
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->gender = $this->gender;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->token = Yii::$app->security->generateRandomString();
        if($user->save()){
            $user->username = 'TNS'.date('Y',time()).str_pad($user->id, 4, 0, STR_PAD_LEFT);
        }
        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
