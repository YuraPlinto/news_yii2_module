<?php

    use yii\widgets\DetailView;
    use yii\helpers\Url;
?>
<div class="news-default-view">
<a href="<?= Url::toRoute('/news/default/index') ?>">Вернуться к списку новостей</a>
<?php
    echo DetailView::widget([
        'model' => $article,
        'attributes' => [
            'title',
            'content',
            [
                'label' => 'Image url',
                'value' => $article->img_url,
            ],
            [
                'label'  => 'Image',
                'value'  => \sprintf("/images/%s", $article->img_url),
                'format' => ['image', ['width'=>'600']],
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]);
?>
</div>
