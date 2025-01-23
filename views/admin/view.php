<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\news\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новостные статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'title',
                'label'     => 'Заголовок'
            ],
            [
                'label'  => 'URL изображения',
                'format' => 'html',
                'value'  => function ($data) {
                    $fileWithPath = \Yii::getAlias('@webroot/images/' . $data->img_url);
                    if (!file_exists($fileWithPath))
                        $result = $data->img_url . ' (Файл не существует)';
                    else
                        $result = \sprintf("<a href='%s'>%s</a>", Url::to('@web/images/' . $data->img_url), $data->img_url);

                    return $result;
                }
            ],
            [
                'attribute' => 'content',
                'format'    => 'text',
                'label'     => 'Текст статьи'
            ],
            [
                'attribute' => 'created_at',
                'format'    => 'datetime',
                'label'     => 'Дата публикации'
            ],
            [
                'attribute' => 'updated_at',
                'format'    => 'datetime',
                'label'     => 'Дата изменения'
            ],
        ],
    ]) ?>

</div>
