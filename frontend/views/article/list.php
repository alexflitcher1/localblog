<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php $this->title = 'Главная' ?>
<div class="articles-all flex dir-column">
  <div class="articles flex">
  <?php for ($i = 0; $i < count($arts); $i++): ?>
      <div class="article flex dir-column" style="padding:3px">
        <a href="/blog/view?id=<?=$arts[$i]['id']?>" class="a-std">
          <div class="article-name">
            <?=Html::encode($arts[$i]['title'])?>
          </div>
          <div class="article-img">
            <img src="<?=Url::to("/photos/{$arts[$i]['img']}")?>" alt="Img">
          </div>
          <div class="article-describe hyphenate">
            <?=Html::encode($arts[$i]['descr'])?>
          </div>
        </a>
        <a href="/article/edit?id=<?=$arts[$i]['id']?>">Редактировать</a>
        <a href="/article/delete?id=<?=$arts[$i]['id']?>&accept=no">Удалить</a>
      </div>
  <?php endfor; ?>
  </div>
  <p class="pager"><?= LinkPager::widget(['pagination' => $pagination]) ?></p>
</div>
