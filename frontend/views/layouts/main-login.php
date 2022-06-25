<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
AppAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
     <link rel="icon" type="image/x-icon" href="<?=$directoryAsset?>/../favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="fullPage">
<?= $content ?>
</div>

<?php $this->endBody() ?>
<script type = "text/javascript" >

</script>
</body>
</html>
<?php $this->endPage() ?>
