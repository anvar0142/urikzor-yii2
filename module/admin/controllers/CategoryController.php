<?php

namespace app\module\admin\controllers;

use app\module\admin\models\CategoryAtributes;
use app\module\admin\models\ProductAtribute;
use Yii;
use app\module\admin\models\Category;
use app\module\admin\models\CategorySearch;
use app\module\seller\controllers\AppSellerController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends AppAdminController
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {

        $cats = Category::find()->all();

        foreach ($cats as $cat) {
            $n = Category::find()->where(['title' => $cat->title])->count();
            if ($n>1) {
                $cat->url = str2url($cat->title).'-'.$n;
            } else {
                $cat->url = str2url($cat->title);
            }
            $cat->save();
        }

        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            $dtitle = Category::find()->where(['title' => $model->title])->asArray()->count();
            if ($dtitle > 0) {
                $model->url = str2url($model->title).'-'.$dtitle;
            } else {
                $model->url = str2url($model->title);
            }
            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $dtitle = Category::find()->where(['title' => $model->title])->asArray()->count();
            if ($dtitle > 0) {
                $model->url = str2url($model->title).'-'.$dtitle;
            } else {
                $model->url = str2url($model->title);
            }
            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
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

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddAtribute() {
        $c_a = new CategoryAtributes();
        $c_a->category_id = $_GET['cat_id'];
        $c_a->atribute_id = $_GET['id'];
        $c_a->save();
    }

    public function actionDeleteAtribute() {
//        $products = ProductAtribute::find()->where(['atribute_id' => $_GET['id']])->all();
//        foreach ($products as $product) {
//            $product->delete();
//        }
        $c_a = CategoryAtributes::find()->where(['category_id' => $_GET['cat_id'], 'atribute_id' => $_GET['id']])->one()->delete();
    }
}
