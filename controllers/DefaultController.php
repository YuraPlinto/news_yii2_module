<?php

namespace app\modules\news\controllers;

use yii\web\Controller;
use app\modules\news\models\Article;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `news` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = Article::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(2);

        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
             'articles' => $articles,
             'pages'    => $pages,
        ]);
    }

    public function actionView($id)
    {
        $article = Article::findOne($id);
        if (null == $article)
            throw new NotFoundHttpException;

        return $this->render('view', [
             'article' => $article,
        ]);
    }
}
