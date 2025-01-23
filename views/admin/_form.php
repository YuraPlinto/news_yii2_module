<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\news\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Заголовок') ?>

    <?= $form->field($model, 'img_url')->textInput(['maxlength' => true])->label('URL изображения (относительно папки images)') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Текст статьи') ?>

    <?= $form->field($model, 'created_at')->textInput()->label('Дата публикации') ?>

    <?= $form->field($model, 'updated_at')->textInput()->label('Дата изменения') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
