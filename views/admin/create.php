<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\news\models\Article $model */

$this->title = 'Создание новости';
$this->params['breadcrumbs'][] = ['label' => 'Новостные статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Создание';
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
