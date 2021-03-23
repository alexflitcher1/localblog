<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?=$message?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->label('')->
    textInput(['placeholder' => 'Введите название статьи',
    'value' => $data->title]) ?>
    <?= $form->field($model, 'descr')->
    textarea(['rows' => 10, 'cols' => 30,
     'placeholder' => 'Введите краткое описание статьи',
     'value' => $data->descr])->label('')  ?>
    <?= $form->field($model, 'text')->
    textarea(['rows' => 10, 'cols' => 30,
     'placeholder' => 'Введите текст статьи',
     'value' => $data->text])->label('') ?>

    <button class="input-std">Submit</button>

<?php ActiveForm::end() ?>
