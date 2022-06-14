<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>


        <div class="container">
            <div class="page-wrapper">
                <div class="contactAddress login-ft">
                  
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="address">
                                <?= Yii::$app->params['custom.addressline1']; ?>
                                <div><?= Yii::$app->params['custom.addressline2']; ?></div>
                                <div>Pin: <?= Yii::$app->params['custom.pincode']; ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="phone">
                                <div class="mb-2">
                                    Secretary: 
                                <span><?= Yii::$app->params['custom.secretary-ph']; ?></span>
                            </div>
                            <div class="mb-2">
                                President: 
                                <span><?= Yii::$app->params['custom.president-ph']; ?></span>
                            </div>
                            <div class="mb-2">
                                Office: 
                                <span><?= Yii::$app->params['custom.office-ph']; ?></span>
                            </div>
                        </div>
                    </div>
                
            </div>


                        </div>
                        <div class="gMap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.7343137080866!2d76.34379241479522!3d10.120820192768372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080f3c9c8ec507%3A0xcde2d95576e4d91b!2sConvent%20Rd%20II%2C%20Thottakkattukara%2C%20Aluva%2C%20Kerala%20683108!5e0!3m2!1sen!2sin!4v1650549933363!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
               
            </div>
        </div>

<!--
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
-->