<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\AtributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribute-index">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?= Html::a('Create atribute', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'title:ntext',

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
