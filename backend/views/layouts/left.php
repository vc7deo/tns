<?php
use yii\helpers\Html;
use yii\helpers\Url;
$cid = Yii::$app->controller->id;
$route = Yii::$app->controller->getRoute();
$active = 'class="active"';
$users = ['student','teacher','parent'];
?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=Url::to(['site/index'])?>" class="brand-link">
    <img src="<?=$directoryAsset?>/img/logo.png" alt="" class="brand-image img-circle elevation-3"
           >
      <span class="brand-text font-weight-light">TNS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="<?=Url::to(['site/index'])?>" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
 
          <li class="nav-item">
          <?= Html::a('<i class="fas fa-users"></i> Normal Users',
              ['/user/index'],
              ['class' => ($cid == 'user') ? 'nav-link active' : 'nav-link']
              ) ?>
          </li>
           
          <li class="nav-item">
          <?= Html::a('<i class="fas fa-users"></i> Premium Users',
              ['/premium/index'],
              ['class' => ($cid == 'premium') ? 'nav-link active' : 'nav-link']
              ) ?>
          </li>
          <li class="nav-item has-treeview <?=($cid=='settings') ? 'menu-open' : ''?>">
            <a href="#" class="nav-link <?=($cid=='settings') ? 'active' : ''?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <?= Html::a('Custom Settings',
              ['/settings/index'],
              ['class' => ($route == 'settings/index') ? 'nav-link active' : 'nav-link']
              ) ?>
              </li>
              <li class="nav-item">
              <?= Html::a('SMTP Settings',
              ['/settings/smtp'],
              ['class' => ($route == 'settings/smtp') ? 'nav-link active' : 'nav-link']
              ) ?>
              </li>
              <li class="nav-item">
              <?= Html::a('Image Settings',
              ['/settings/image'],
              ['class' => ($route == 'settings/image') ? 'nav-link active' : 'nav-link']
              ) ?>
              </li>
            </ul>
          </li>       
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>