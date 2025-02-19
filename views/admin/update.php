<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\news\models\Article $model */

$this->title = 'Редактирование статьи: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новостные статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
