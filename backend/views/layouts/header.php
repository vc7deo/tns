<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <?= Html::a('<i class="fas fa-power-off"></i>',
            ['/site/logout'],
            ['data-method' => 'post', 'class' => 'nav-link', 'title' => 'Sign Out']
        ) ?>
      </li>
    </ul>
  </nav>
