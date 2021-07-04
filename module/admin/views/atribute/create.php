<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\Atribute */

$this->title = 'Create Atribute';
$this->params['breadcrumbs'][] = ['label' => 'Atributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribute-create">

    <?= $this->render('_form', [
        'model' => $model,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
