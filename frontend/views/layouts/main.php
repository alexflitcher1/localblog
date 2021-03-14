<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\BlogAsset;
use common\widgets\Alert;

BlogAsset::register($this);
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
<body>
<?php $this->beginBody() ?>
<header class="flex dir-column">
    <a class="a-std" href="/">
      <div class="logo">
        LocalBlog
      </div>
    </a>
</header>
<main class="flex dir-column">
  <?=$content?>
</main>
<footer class="flex dir-column">
    <div class="logo">
      LocalBlog (c)2021
    </div>
</footer>
<div id="openModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Внимание</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">
        <p class="result-do"></p>
        <p class="input-will-change">Пожалуйста, закройте окно</p>
      </div>
    </div>
  </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
