<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\Atribute */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Atributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="atribute-view">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'title:ntext',
                            'custom_value',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
