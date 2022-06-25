<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $height
 * @property string|null $height_unit
 * @property string|null $weight
 * @property string|null $weight_unit
 * @property int|null $marital_status
 * @property int|null $body_type
 * @property int|null $physical_status
 * @property string|null $languages_known
 * @property int|null $eating_habits
 * @property int|null $drinking_habits
 * @property int|null $smoking_habits
 * @property string|null $education
 * @property string|null $education_details
 * @property string|null $employed_in
 * @property string|null $occupation
 * @property string|null $occupation_details
 * @property string|null $income
 * @property string|null $religion
 * @property string|null $caste
 * @property string|null $sub_caste
 * @property string|null $other
 * @property string|null $star
 * @property string|null $rasi
 * @property int|null $sudha_jathakam
 * @property string|null $gothram
 * @property int|null $family_type
 * @property int|null $family_status
 * @property string|null $fathers_occupation
 * @property string|null $mothers_occupation
 * @property string|null $origin
 * @property int|null $brothers
 * @property int|null $sisters
 * @property string|null $city
 * @property int|null $state
 * @property int|null $country
 * @property string|null $citizenship
 * @property string|null $hobbies
 * @property string|null $interests
 * @property string|null $about_me
 * @property string|null $photo1
 * @property string|null $photo2
 * @property string|null $photo3
 * @property int $user_id
 * @property int $page_no
 * @property int $status
 * @property int $edit_status
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file1;
    public $file2;
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['height', 'weight','marital_status', 'body_type', 'physical_status','sub_caste','occupation','star', 'eating_habits', 'drinking_habits', 'smoking_habits','dob'], 'required', 'on' => 'page-one'],
            [['family_type', 'family_status', 'country', 'state', 'city', 'citizenship','about_me'], 'required', 'on' => 'page-two'],
            [['sudha_jathakam', 'brothers', 'sisters', 'country', 'user_id', 'page_no', 'status', 'edit_status'], 'integer'],
            [['about_me'], 'string'],
            [['user_id'], 'required'],
            [['height_unit','weight_unit','marital_status', 'body_type', 'physical_status', 'eating_habits', 'drinking_habits', 'smoking_habits', 'family_type', 'family_status'], 'string', 'max' => 100],
            [['height', 'weight'], 'number'],
            [['education', 'education_details', 'employed_in', 'occupation', 'occupation_details', 'income', 'religion', 'caste', 'sub_caste', 'other', 'star', 'rasi', 'gothram', 'fathers_occupation', 'mothers_occupation', 'origin', 'state', 'city', 'citizenship', 'hobbies', 'interests', 'photo1', 'photo2', 'photo3'], 'string', 'max' => 255],
            [['languages_known','dob'], 'safe'],
            [['file1','file2'],'safe'],
            [['file1','file2'], 'image','minWidth' => 200, 'minHeight' => 200, 'maxWidth' => 1024, 'maxHeight' => 1024, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dob' => 'Date of Birth',
            'height' => 'Height',
            'height_unit' => 'Height Unit',
            'weight' => 'Weight',
            'weight_unit' => 'Weight Unit',
            'marital_status' => 'Marital Status',
            'body_type' => 'Body Type',
            'physical_status' => 'Physical Status',
            'languages_known' => 'Languages Known',
            'eating_habits' => 'Eating Habits',
            'drinking_habits' => 'Drinking Habits',
            'smoking_habits' => 'Smoking Habits',
            'education' => 'Education',
            'education_details' => 'Education Details',
            'employed_in' => 'Employed In',
            'occupation' => 'Occupation',
            'occupation_details' => 'Occupation Details',
            'income' => 'Annual Income',
            'religion' => 'Religion',
            'caste' => 'Caste',
            'sub_caste' => 'Sub Caste',
            'other' => 'Other',
            'star' => 'Star',
            'rasi' => 'Rasi',
            'sudha_jathakam' => 'Sudha Jathakam',
            'gothram' => 'Gothram',
            'family_type' => 'Family Type',
            'family_status' => 'Family Status',
            'fathers_occupation' => 'Fathers Occupation',
            'mothers_occupation' => 'Mothers Occupation',
            'origin' => 'Family origin',
            'brothers' => 'No. of Brothers',
            'sisters' => 'No. of Sisters',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'citizenship' => 'Citizenship',
            'hobbies' => 'Hobbies',
            'interests' => 'Interests',
            'about_me' => 'About Me',
            'photo1' => 'Photo 1',
            'photo2' => 'Photo 2',
            'photo3' => 'Photo 3',
            'user_id' => 'User ID',
            'page_no' => 'Page No',
            'status' => 'Status',
            'edit_status' => 'Edit Status',
        ];
    }
    public function getCntry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country']);
    }
    public function getSubCaste()
    {
        if(!empty($this->other)){
            return $this->other;
        }else{
            return $this->sub_caste;
        }
    }
    /**
     * {@inheritdoc}
     * @return \common\models\query\ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProfileQuery(get_called_class());
    }
}
