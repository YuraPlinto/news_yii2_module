<?php

    use yii\widgets\LinkPager;
    use yii\helpers\Url;
?>
<style>
    .news-list {
        margin-top: 2em;
    }
    .news-article {
        display: flex;
        border: 1px solid black;
        margin-bottom: 1em;
    }
    .news-article img {
        max-width: 300px;
    }
    .news-article .text {
        padding: 2em 1em 2em 1em;
    }
</style>
<div class="news-default-index">
    <h1>Новости</h1>
    <div class="news-list">
        <?php foreach($articles as $article): ?>
            <div class="news-article">
                <?php if(!\is_null($article->img_url)): ?>
                    <img src="<?= Url::to('@web/images/' . $article->img_url) ?>">
                <?php endif ?>
                <div class="text">
                    <a href="<?= \sprintf("%s/news/view/%d", Url::base(true), $article->id) ?>"><?= $article->title ?></a>
                    <p><?= $article->content ?></p>
                </div>
            </div>
    <?php endforeach ?>
    <div>

    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>
