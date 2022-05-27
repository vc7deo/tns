<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\PasswordResetRequestForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="flex-home">
        <div class="home-banner" style="background: url(<?=$directoryAsset?>/images/banner.svg)">
                
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
                <h5>Forgot Password?</h5>
                <h6>
                    Enter your e-mail address and we'll 
send you a link to reset your password
                </h6>
    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <div class="enterCategory">
                <?= $form->field($model, 'email')->textInput() ?>

                </div>
                <div class="loginButton">
                    <?= Html::submitButton('SEND', ['class' => '']) ?>
                </div>
                <div class="backLoginBtn">
<?=Html::a('<i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to login',['site/login'])?>
                </div>
                 <?php ActiveForm::end(); ?>
            </div>
        </div>

        </div>
    </div>
                        <div class="footer">
        This website is strictly for matrimonial purpose only and not a dating website.
<span>Copyright © 2022. All rights reserved.</span>
    </div></div>
