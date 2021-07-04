<?php

use kartik\editable\Editable;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\Atribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atribute-form">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Attributes</a></li>
                    <?php if($_GET['id']): ?>
                        <li class="nav-item values"><a class="nav-link" href="#tab_2" data-toggle="tab">Values</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php $form = ActiveForm::begin(); ?>

                        <div class="row">
                            <div class="col-6">
                                <?= $form->field($model, 'title')->textInput() ?>
                            </div>
                            <div class="col-6" style="align-self: flex-end">
                                <?= $form->field($model, 'custom_value')->checkbox(['id' => 'cv']) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                            <?= Html::a('Back', '/admin/atribute', ['class' => 'btn btn-danger']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                Add value
                            </button>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'name:ntext',

//                                    ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
                                    [
                                        'class' => 'yii\grid\ActionColumn', 'template' => '{delete}',
                                        'urlCreator' => function ($action, $model, $key, $index) {
                                            if ($action === 'delete') {
                                                return Url::to(['/admin/atribute-value/delete', 'id' => $model->id, 'atr_id' => $_GET['id']]);
                                            }
                                        }
                                    ]
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add value</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" type="text" name="value" id="value" placeholder="Value">
                <input type="hidden" name="atr_id" id="atr_id">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
$('#save').click(function() {
    v = $('#value').val()
    if (v != '') {
    $.ajax({
        url: '/admin/atribute-value/add',
        data: {name: v, atr_id: $_GET[id]},
        type: 'GET',
        success: function (res) {
            location.reload()
        },
        error: function (err) {
        }
    })
        $("#modal-default").modal('toggle');
    } else {
        alert('Value is empty!')
    }
})

edit_type()

$('#cv').change(function() {
    edit_type()
})

function edit_type() {
      if (!$('#cv').prop('checked')) {
        $('#tab_2>div').show()
        $('.values').show()
    } else {
        $('#tab_2>div').hide()
        $('.values').hide()
    }
}
JS;

$this->registerJs($js);


?>