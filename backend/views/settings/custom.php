<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\FileInput;
use kidzen\dynamicform\DynamicFormWidget;
$this->title = 'Custom Settings';
//print_r($settings);exit;
/* @var $this yii\web\View */
/* @var $model backend\models\Basic */
/* @var $form yii\widgets\ActiveForm */
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .item .card-title").each(function(index) {
        jQuery(this).html("Setting: " + (index + 1))
    });
    jQuery(".dynamicform_wrapper .readonly").last().removeAttr("readonly");
    jQuery(".dynamicform_wrapper .key").last().text("");
  
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .item .card-title").each(function(index) {
        jQuery(this).html("Setting: " + (index + 1))
    });
});
$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});
';

$this->registerJs($js);
?>
      
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form','options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 100, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $settings[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'title',
            'name',
            'value',
        ],
    ]); ?>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Custom Settings</h3>
        <div class="card-tools">
        <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add a Setting</button>
        </div>
        </div>
        <div class="card-body container-items"><!-- widgetContainer -->
            <?php foreach ($settings as $index => $setting): ?>
              <?php $setting->scenario = 'custom-only';  ?>
                <div class="item card card-default"><!-- widgetBody -->
                    <div class="card-header">
                    <h3 class="card-title">Setting: <?= ($index + 1) ?></h3>
                    <div class="card-tools">
                    <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                        <?php
                            // necessary for update action.
                            if (!$setting->isNewRecord) {
                                echo Html::activeHiddenInput($setting, "[{$index}]id");
                            }
                        ?>
                        <?php if($setting->name == 'office-address' || $setting->name == 'head-office-address'): ?>
                        <div class="row">
                            <div class="col-sm-3">
                                  <?= $form->field($setting, "[{$index}]title")->textInput(['maxlength' => true,'readonly' => true,'class' => 'form-control readonly']) ?>
                            </div>
                            <div class="col-sm-7">
                                <?= $form->field($setting, "[{$index}]value")->textarea(['rows' => '4']) ?>
                            </div>
                            <div class="col-sm-2">
                            <label>Key</label><br><span class="key"><?= !$setting->isNewRecord ? $setting->name : ''?></span>
                            </div>
                        </div><!-- end:row -->
                        <?php else: ?>
                        <div class="row">
                            <div class="col-sm-3">
                                  <?= $form->field($setting, "[{$index}]title")->textInput(['maxlength' => true,'readonly' => true,'class' => 'form-control readonly']) ?>
                            </div>
                            <div class="col-sm-7">
                                <?= $form->field($setting, "[{$index}]value")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                            <label>Key</label><br><span class="key"><?= !$setting->isNewRecord ? $setting->name : ''?></span>
                            </div>
                        </div><!-- end:row -->
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
      <div class="form-group">
        <?= Html::submitButton($setting->isNewRecord ? 'Create' : 'Update', ['class' => $setting->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>
          </div>
        </div></div>
            <?php ActiveForm::end(); ?>
      
