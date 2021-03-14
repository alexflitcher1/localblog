<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Articles;
use common\models\ArticleManager;


class BlogController extends Controller
{
    public function actionIndex()
    {
        $arts = Articles::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $arts->count(),
        ]);
        $arts = $arts->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', ['arts' => $arts,
        'pagination' => $pagination]);
    }

    public function actionView($id)
    {
        $art = new ArticleManager();
        $art->id = $id;
        $art = $art->get();
        return $this->render('view', ['art' => $art]);
    }
}
