<?php

namespace app\module\admin\controllers;

use Yii;
use app\module\admin\models\User;
use app\module\seller\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AppAdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->role = 'customer';
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            $model->token = hash('ripemd160', $model->username);

            if ($model->save()) {
                if ($model->send_email) {
                    if (!Yii::$app->mailer->compose()
                        ->setFrom('anvar0142@yandex.ru')
                        ->setTo($model->email)
                        ->setSubject('?????????????????????? ?? ?????????? GMART.SU') // ???????? ????????????
                        ->setTextBody('<p>Follow the link to activate your account: <a href="http://vendor.loc/activate?id=' . $model->token . '">http://vendor.loc/activate?id=' . $model->token . '<a/></p>')
                        ->setHtmlBody('<p>Follow the link to activate your account: <a href="http://vendor.loc/activate?id=' . $model->token . '">http://vendor.loc/activate?id=' . $model->token . '<a/></p>')
                        ->send()) {
                        Yii::$app->session->setFlash('error', 'An unexpected error has occurred. Try again');
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $mail_psw = $model->password;
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            if ($model->save()) {
                if ($model->send_email) {
                    if (!Yii::$app->mailer->compose()
                        ->setFrom('anvar0142@yandex.ru')
                        ->setTo($model->email)
                        ->setSubject('?????????????????????? ?? ?????????? GMART.SU') // ???????? ????????????
                        ->setTextBody('<p>Follow the link to activate your account: <a href="http://vendor.loc/activate?id=' . $model->token . '">http://vendor.loc/activate?id=' . $model->token . '<a/></p>')
                        ->setHtmlBody('<p>Follow the link to activate your account: <a href="http://vendor.loc/activate?id=' . $model->token . '">http://vendor.loc/activate?id=' . $model->token . '<a/></p>')
                        ->send()) {
                        Yii::$app->session->setFlash('error', 'An unexpected error has occurred. Try again');
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSeller() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $seller = 1);

        return $this->render('seller', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
