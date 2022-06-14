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
        
            <div class="container">
            <div class="loginAddress">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="address">
                                <?= Yii::$app->params['custom.addressline1']; ?>, <?= Yii::$app->params['custom.addressline2']; ?>,
                                Pin: <?= Yii::$app->params['custom.pincode']; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="phone">
                                <span><?= Yii::$app->params['custom.login-ph1']; ?>,</span>
                                <span><?= Yii::$app->params['custom.login-ph2']; ?></span>
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
                <h5>LOGIN</h5>
                <div class="regSection">
<span>For Free Registration</span> <?=Html::a('Register Here',['site/signup'])?>
</div>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="enterCategory">
                    <?= $form->field($model, 'username')->textInput() ?>
</div>

<div class="enterCategory">

                <?= $form->field($model, 'password')->passwordInput() ?>
                </div>

                <div class="keepLogin"><?= $form->field($model, 'rememberMe')->checkbox() ?></div>

  

                <div class="loginButton">
                    <?= Html::submitButton('Login', ['class' => '', 'name' => 'login-button']) ?>
                </div>  

                              <div class="forgotPassword">
            <?= Html::a('Resend new verification email', ['site/resend-verification-email']) ?>
            <?= Html::a('Forgot password?', ['site/request-password-reset']) ?>.
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

           