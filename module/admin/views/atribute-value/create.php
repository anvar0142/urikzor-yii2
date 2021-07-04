<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\AtributeValue */

$this->title = 'Create Atribute Value';
$this->params['breadcrumbs'][] = ['label' => 'Atribute Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribute-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
