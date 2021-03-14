<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?=$message?>
<?php $form = ActiveForm::begin(['options' =>
                                  [
                                    'enctype' => 'multipart/form-data',
                                    'class' => 'flex dir-column',
                                  ],
                                ]); ?>
    <?= $form->field($model, 'title')->label('')->
    textInput(['placeholder' => 'Введите название статьи']) ?>
    <?= $form->field($model, 'descr')->
    textarea(['rows' => 10, 'cols' => 30,
     'placeholder' => 'Введите краткое описание статьи'])->label('')  ?>
    <?= $form->field($model, 'text')->
    textarea(['rows' => 10, 'cols' => 30,
     'placeholder' => 'Введите текст статьи'])->label('') ?>
    <?= $form->field($model, 'img')->fileInput()->label('') ?>

    <button class="input-std">Submit</button>

<?php ActiveForm::end() ?>
