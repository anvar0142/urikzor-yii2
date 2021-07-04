<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\admin\models\AtributeValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atribute Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribute-value-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Atribute Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'atribute_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
