<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use frontend\models\Articles;
use common\models\ArticleManager;


class ArticleController extends Controller
{
    public function actionIndex()
    {
        $cookies = Yii::$app->request->cookies;
        if (!$cookies->getValue('auth', 0))
            return $this->redirect(['article/auth']);

        $model = new ArticleManager();

        if (Yii::$app->request->isPost) {
            $model->title = Yii::$app->request->post()['ArticleManager']['title'];
            $model->text = Yii::$app->request->post()['ArticleManager']['text'];
            $model->descr = Yii::$app->request->post()['ArticleManager']['descr'];
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->set()) {
                return $this->render('index', ['message' => 'Success',
                'model' => $model]);
            }
        }
        return $this->render('index', ['message' => '', 'model' => $model]);
    }

    public function actionAuth()
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->getValue('auth', 0))
            return $this->redirect(['article/index']);
        return $this->render('auth');
    }

    public function actionCheck($login = '', $password = '')
    {
        $this->layout = 'none';
        $cookies = Yii::$app->response->cookies;
        if ($login == 'admin' && $password == 'admin') {
          $cookies->add(new \yii\web\Cookie([
              'name' => 'auth',
              'value' => '1',
          ]));
          return $this->render('check', ['error' => 'Success']);
        }
        return $this->render('check',
        ['error' => 'Login or password is not available']);
    }

    public function actionList()
    {
        $cookies = Yii::$app->request->cookies;
        if (!$cookies->getValue('auth', 0))
            return $this->redirect(['article/auth']);

        $arts = Articles::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $arts->count(),
        ]);
        $arts = $arts->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('list', ['arts' => $arts,
        'pagination' => $pagination]);
    }

    public function actionDelete($id = 0, $accept = 'no')
    {
        $cookies = Yii::$app->request->cookies;
        if (!$cookies->getValue('auth', 0))
            return $this->redirect(['article/auth']);
        $name = Articles::findOne(['id' => $id])->title;
        if ($accept == 'no')
            return $this->render('nodelete', ['name' => $name, 'id' => $id]);
        if ($accept == 'yes') {
            $art = Articles::findOne(['id' => $id]);
            if ($art->delete())
                return $this->render('delete', ['name' => $name]);
        }
    }

    public function actionEdit($id = 0)
    {
        $cookies = Yii::$app->request->cookies;
        if (!$cookies->getValue('auth', 0))
            return $this->redirect(['article/auth']);

        $model = new ArticleManager();
        $data  = Articles::findOne(['id' => $id]);

        if (Yii::$app->request->isPost) {
            $model->title = Yii::$app->request->post()['ArticleManager']['title'];
            $model->text = Yii::$app->request->post()['ArticleManager']['text'];
            $model->descr = Yii::$app->request->post()['ArticleManager']['descr'];
            $model->id = $id;
            if ($model->update()) {
                return $this->render('edit', ['message' => 'Success',
                'model' => $model, 'data' => $data]);
            }
        }
        return $this->render('edit', ['message' => '', 'model' => $model,
        'data' => $data]);
    }
}
