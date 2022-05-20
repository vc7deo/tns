<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
$model->rememberMe = 1;
$this->title = 'Login';
?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php $form = ActiveForm::begin(['id' => 'login-form',
          'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
        ],
      ]); ?>
        <?= $form->field($model, 'username',
['inputOptions' => [
    'autocomplete' => 'off'],'template' => '<div class="input-group mb-3">{input}
    <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-envelope"></span>
    </div>
  </div></div>{error}']
)->textInput(['autofocus' => true,'placeholder' => 'Username'])->label(false) ?>
<?= $form->field($model, 'password',
['template' => '<div class="input-group mb-3">
{input}
<div class="input-group-append">
<div class="input-group-text">
  <span class="fas fa-lock"></span>
</div>
</div>
</div>{error}']
)->passwordInput(['autofocus' => true,'placeholder' => 'Password'])->label(false) ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <?= Html::checkBox('rememberMe', $model->rememberMe, ['id' => 'remember']) ?>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
          </div>
          <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
