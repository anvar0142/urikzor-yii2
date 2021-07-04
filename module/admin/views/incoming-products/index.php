<?php

use app\module\admin\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\IncomingProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $products \app\module\admin\models\Product */

$this->title = 'Incoming Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incoming-products-index">

    <?php echo $this->render('_form', ['model' => $model, 'products' => $products]); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'id',
                                        [
                                            'attribute' => 'product_id',
                                            'value' => function($data) {
                                                return $data->product->title;
                                            },
                                            'filter'=>ArrayHelper::map(Product::find()->select(['id', 'title'])->asArray()->all(), 'id', 'title'),
                                        ],
                                        'quantity',
                                        'price',
                                        'exch',
                                        'selling_price',
                                        'date',
                                        'code',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
