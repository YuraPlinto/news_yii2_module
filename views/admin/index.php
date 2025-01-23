<?php

use app\modules\news\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Новостные статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=Html::beginForm(['bulk-delete'],'post');?>
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
        <?=Html::submitButton('Delete selected', ['class' => 'btn btn-danger', 'id' => 'delete-selected'])?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'class'           => \yii\grid\CheckboxColumn::className(),
                'checkboxOptions' => function ($data) {
                    return ['value' => $data->id];
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    <?= Html::endForm();?> 

</div>
