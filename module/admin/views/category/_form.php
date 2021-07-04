<?php

use app\module\admin\models\Atribute;
use app\module\admin\models\CategoryAtributes;
use kartik\file\FileInput;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
    <div class="card">
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group field-category-parent_id has-success">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div>

                        <label class="control-label" for="category-parent_id">Родительская
                            категория</label>
                        <select id="category-parent_id" class="form-control"
                                name="Category[parent_id]">
                            <option value="0">Root category</option>
                            <?= \app\components\MenuWidget::widget([
                                'tpl' => 'select',
                                'model' => $model,
                                'cache_time' => 0,
                            ]) ?>
                        </select>

                        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                    </div>

                    <?php if($_GET['id']): ?>
                        <div class="col-sm-6">
                            <label>Attributes</label><br>
                            <button style="margin-bottom: 15px;" type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#atribute-modal">
                                Add attribute
                            </button>
                            <?php
                            $ca = CategoryAtributes::find()->with('atribute')->where(['category_id' => $_GET['id']])->asArray()->all();
                            ?>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th style="width: 50px; text-align: center">№</th>
                                    <th>Title</th>
                                    <th style="width: 50px; text-align: center">Delete</th>
                                </tr>
                                <?php for ($i = 0; $i < count($ca); $i++): ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>
                                        <td><?= $ca[$i]['atribute']['title'] ?></td>
                                        <td><a href="#" class="del-btn" data-atr='<?= $ca[$i]['atribute']['id'] ?>'><span
                                                        class="fa fa-trash"></span></a></td>
                                    </tr>
                                <?php endfor; ?>
                            </table>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        <?= Html::a('Back', '/admin/category', ['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$c = CategoryAtributes::find()->where(['category_id' => $_GET['id']])->select('atribute_id')->asArray()->all();
$atrs = (new \yii\db\Query())
    ->select(['id', 'title'])
    ->from('atribute');
foreach ($c as $atr) {
    $atrs->andWhere('`id` !=' . $atr['atribute_id']);
}
$atrs = $atrs->all();
?>
<div class="modal fade" id="atribute-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select class="form-control" type="text" name="value" id="value">
                    <?php foreach ($atrs as $atr): ?>
                        <option value="<?= $atr['id'] ?>"><?= $atr['title'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="cat_id" id="cat_id" value="<?= $_GET['id'] ?>">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#atribute-modal">Close
                </button>
                <button type="button" class="btn btn-primary" id="save">Add</button>
            </div>
        </div>
    </div>
</div>


<?php
$script = <<<JS
    $('.del-btn').click(function() {
        v = confirm('Удалить атрибут?', 'да', 'нет')
        if (v) {
            $.ajax({
               url: '/admin/category/delete-atribute',
               data:{id:$(this).attr('data-atr'), cat_id: $_GET[id]},
                type: 'GET',
                success: function (res) {
                    location.reload()
                },
                error: function (err) {
                }
            })
        }
    })
    
    $('#save').click(function() {
        $.ajax({
           url: '/admin/category/add-atribute',
           data:{id:$('#value').val(), cat_id: $_GET[id]},
            type: 'GET',
            success: function (res) {
                location.reload()
            },
            error: function (err) {
            }
        })
      $("#atribute-modal").modal('toggle');
    })
JS;
$this->registerJs($script);
?>
