<?php
namespace frontend\models;
use Yii;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class AvatarForm extends Model
{
    public $image1;
    public $image2;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['image1','image2'],'safe'],
            [['image1','image2'], 'image','minWidth' => 200, 'minHeight' => 200, 'maxWidth' => 2000, 'maxHeight' => 2000, 'extensions' => 'png, jpg, jpeg,JPG, JPEG'],

        ];
    }

    // /**
    //  * Signs user up.
    //  *
    //  * @return User|null the saved model or null if saving fails
    //  */
    // public function profile($profile)
    // {
    //     if (!$this->validate()) {
    //         return null;
    //     }

    //     $profile->photo1 = $this->photo1;
    //     $profile->photo2 = $this->photo2;
    //     return $profile->save(false);

    // }


}
