<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->title = Html::encode($art->title) ?>
<div class="market-hack">
  <div class="article-name" style="margin-bottom:1%;">
    <?=$this->title?>
  </div>
  <div class="img-std">
    <img src="<?=Url::to(["/photos/$art->img"])?>" alt="Image">
  </div>
  <div class="text-std hyphenate" style="white-space: pre-line">
      <?=$art->text?>
  </div>
</div>
