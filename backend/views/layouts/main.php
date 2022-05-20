<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;

use backend\assets\AdminLteAsset;

AdminLteAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/web/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

<?= $this->render(
    'header.php',
    ['directoryAsset' => $directoryAsset]
) ?>

<?= $this->render(
    'left.php',
    ['directoryAsset' => $directoryAsset]
)
?>

<?= $this->render(
    'content.php',
    ['content' => $content, 'directoryAsset' => $directoryAsset]
) ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
