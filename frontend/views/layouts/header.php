<?php
use yii\helpers\Html;
use yii\helpers\Url;
$route = Yii::$app->controller->getRoute();
$cid = Yii::$app->controller->id;
?>
<div class="topHeaderBorder">
<div class="container">
<header>
<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand logo" href="#"><img src="<?=$directoryAsset?>/images/logo.png" alt="logo" /></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto topnavHead">
<li class="nav-item">
<a class="nav-link" href="<?=Url::to(['site/dashboards'])?>">Home </a>
</li>
<li class="nav-item active">
<a class="nav-link" href="<?=Url::to(['site/dashboards'])?>">My Profile</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=Url::to(['profile/search'])?>">Search</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=Url::to(['site/contact'])?>">Contact TNS</a>
</li>
</ul>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img src="<?=$directoryAsset?>/images/user.jpg">
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="<?=Url::to(['profile/edit'])?>">Edit Profile</a>
<a class="dropdown-item" href="<?=Url::to(['site/logout'])?>" data-method="post">Logout</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Help</a>
</div>
</li>
</div>
</nav>
</header>
</div>
</div>