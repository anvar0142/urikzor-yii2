<?php

namespace app\module\admin\controllers;

use app\module\admin\models\AtributeValue;
use app\module\admin\models\CategoryAtributes;
use app\module\admin\models\Images;
use app\module\admin\models\ProductAtribute;
use Yii;
use app\module\admin\models\Product;
use app\module\admin\models\ProductSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends AppAdminController
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->img = '';
        $model->created_date = date('d-m-Y');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            foreach ($_POST['atribute']['value'] as $i => $value) {
                $product_atr = new ProductAtribute();
                $product_atr->product_id = $model->id;
                $product_atr->atribute_id = $i;
                $product_atr->value = $value;
                $product_atr->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $old_atrs = ProductAtribute::find()->where(['product_id' => $id])->all();
            foreach ($old_atrs as $old_atr) {
                $old_atr->delete();
            }

            if (isset($_POST['atribute'])) {
                foreach ($_POST['atribute']['value'] as $i => $value) {
                    $product_atr = new ProductAtribute();
                    $product_atr->product_id = $id;
                    $product_atr->atribute_id = $i;
                    $product_atr->value = $value;
                    $product_atr->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $atrs = ProductAtribute::find()->where(['atribute_id' => $id])->all();
        foreach ($atrs as $atr) {
            $atr->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetAtributes($cat_id, $product_id = null) {
        $res = '';
        $cat_atr = CategoryAtributes::find()->where(['category_id' => $cat_id])->with('atribute')->asArray()->all();
        if ($product_id != null) {
            foreach ($cat_atr as $item) {
                $res .= '
                <div class="col-sm-4">
                    <label class="control-label"?>'.$item['atribute']['title'].'</label>
                ';
                $prd_atr_val = ProductAtribute::find()->where(['atribute_id' => $item['atribute_id'], 'product_id' => $product_id])->asArray()->one();
                if ($item['atribute']['custom_value']) {
                    if ($prd_atr_val) {
                        $res .= '<input class="form-control" type="text" name="atribute[value][' . $item['atribute']['id'] . ']" value="' . $prd_atr_val['value'] . '">';
                    } else {
                        $res .= '<input class="form-control" type="text" name="atribute[value][' . $item['atribute']['id'] . ']" value="">';
                    }
                } else {
                    $atr_val = AtributeValue::find()->where(['atribute_id' => $item['atribute']['id']])->asArray()->all();
                    $res .= '<select class="form-control" name="atribute[value]['.$item['atribute']['id'].']">';
                    foreach ($atr_val as $atr) {
                        if ($atr['name'] == $prd_atr_val['value']) {
                            $res .= '<option selected value="'.$atr['name'].'">'.$atr['name'].'</option>';
                        } else {
                            $res .= '<option value="'.$atr['name'].'">'.$atr['name'].'</option>';
                        }
                    }
                    $res .= '</select>';
                }
                $res.='</div>';
            }
        } else {
            foreach ($cat_atr as $item) {
                $res .= '
            <div class="col-sm-4">
                <label class="control-label"?>'.$item['atribute']['title'].'</label>
            ';
                if ($item['atribute']['custom_value']) {
                    $res .= '<input class="form-control" type="text" name="atribute[value]['.$item['atribute']['id'].']" id="">';
                } else {
                    $atr_val = AtributeValue::find()->where(['atribute_id' => $item['atribute']['id']])->asArray()->all();
                    $res .= '<select class="form-control" name="atribute[value]['.$item['atribute']['id'].']">';
                    foreach ($atr_val as $atr) {
                        $res .= '<option value="'.$atr['name'].'">'.$atr['name'].'</option>';
                    }
                    $res .= '</select>';
                }
                $res .= '</div>';
            }
        }
        return $res;
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
