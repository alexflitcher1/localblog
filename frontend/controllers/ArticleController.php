<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
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
}
