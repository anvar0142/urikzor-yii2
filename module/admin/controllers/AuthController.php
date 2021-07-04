<?php


namespace app\module\admin\controllers;


use app\models\LoginForm;
use Yii;

class AuthController extends AppAdminController
{

    public $layout = 'auth';

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest and Yii::$app->user->identity->role == 'admin') {
            $this->redirect('/admin');
//            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect('/admin');
//            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $this->redirect('/admin');
//            return $this->goBack();
    }
}
