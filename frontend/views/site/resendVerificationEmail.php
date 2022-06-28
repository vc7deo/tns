<?php

/** @var yii\web\View$this  */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="flex-home">
        <?php if(!empty(Yii::$app->params['image.image'])): ?>
        <div class="home-banner" style="background: url(<?=Yii::getAlias('@site/uploads/images/').Yii::$app->params['image.image']?>">
    <?php else:?>
         <div class="home-banner" style="background: url(<?=$directoryAsset?>/images/banner.svg)">
    <?php endif; ?>
                
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
<h5>Resend verification email</h5>
                <h6>Please fill out your email. A verification email will be sent there.</h6>
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

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

           
