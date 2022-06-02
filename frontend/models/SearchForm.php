<?php
namespace frontend\models;
use Yii;

use yii\base\Model;
use common\models\User;

/**
 * Search form
 */
class SearchForm extends Model
{
    public $term;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['term','safe'],
        ];
    }


}
