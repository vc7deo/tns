<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flex-home">
        <div class="home-banner" style="background: url(<?=$directoryAsset?>/images/banner.svg)">
                <div class="nairSamajam">
            തോട്ടക്കാട്ടുകര നായർ സമാജം 
നായർ മാട്രിമോണി
        </div>
            <div class="container">
            <div class="loginAddress">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="address">
                                Convent Road II, Thottakkattukara, Aluva,
                                Pin: 683108
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="phone">
                                <span>9087568900,</span>
                                <span>9087568900</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-right">
        <div class="LoginContentBox">
<!--             <div class="regSection">
                <span>For Free Registration</span>
                <a href="register.html">Register Here</a>
            </div> -->
            <div class="logo-main"><img src="<?=$directoryAsset?>/images/logo-main.png" alt="logo" /></div>
            
            <div class="loginCenter">
<?php if(Yii::$app->session->hasFlash('success')) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?=Yii::$app->session->getFlash('success');?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php endif; ?>
<?php if(Yii::$app->session->hasFlash('error')) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<?=Yii::$app->session->getFlash('error');?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php endif; ?>
                <h5>REGISTER</h5>
                <div class="regSection">
                    <span>Already a member?</span>
<?=Html::a('Login',['site/login'])?>
</div>
<?php $form = ActiveForm::begin(['id' => 'signup-form','enableAjaxValidation' => true, 'validationUrl' => ['site/validation']]); ?>
 <div class="row">
                    <div class="col-sm-6">
                        <div class="enterCategory">
<?= $form->field($model, 'first_name')->textInput() ?>
</div>
</div>
                    <div class="col-sm-6">
                        <div class="enterCategory">
<?= $form->field($model, 'last_name')->textInput() ?>
</div>
</div>
                    <div class="col-sm-6">
                        <div class="enterCategory">
<?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male','Female' => 'Female'],['prompt' => 'Select']) ?>
</div>
</div>

                                    <div class="col-sm-6">
                        <div class="enterCategory">
<?= $form->field($model, 'phone') ?>
</div>
</div>
                    <div class="col-sm-6">
                        <div class="enterCategory">
                <?= $form->field($model, 'email') ?>
                </div>
                </div>

                    <div class="col-sm-6">
                        <div class="enterCategory">
                <?= $form->field($model, 'password')->passwordInput() ?>
</div>
</div>
</div>
                <div class="loginButton">
                    <?= Html::submitButton('Register', ['class' => '', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>

        </div>
    </div>
                                   <div class="footer">
        This website is strictly for matrimonial purpose only and not a dating website.
<span>Copyright © 2022. All rights reserved.</span>
    </div>