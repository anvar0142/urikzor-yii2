<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?= Html::a('Create product', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'title:ntext',

                                        [
                                            'attribute' => 'img',
                                            'value' => function ($data) {
                                                return '/'.$data->img;
                                            },
                                            'format' => ['image', ['height' => '100']]
                                        ],
                                        [
                                            'attribute' => 'category_id',
                                            'value' => function($data) {
                                                return $data->category->title;
                                            }
                                        ],
                                        //'price',
                                        //'old_price',
                                        //'description:ntext',
                                        //'keywords:ntext',
                                        //'img:ntext',
                                        //'is_offer',
                                        //'atributes:ntext',
                                        //'quantity',

                                        ['class' => 'yii\grid\ActionColumn', 'header' => 'Actions', 'template' => "<div>{view} {update} {delete}</div>"],
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
