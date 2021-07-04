<?php

use app\module\admin\models\Images;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
$cat_atr = \app\module\admin\models\CategoryAtributes::find()->where(['category_id' => $model->category_id])->with('atribute')->asArray()->all();
?>
<div class="product-form">
    <div class="card">
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-sm-4">
                            <label class="control-label" for="product-category_id">Select category</label>
                            <select id="product-category_id" class="form-control" name="Product[category_id]">
                                <option value="">Select</option>
                                <?= \app\components\MenuWidget::widget([
                                    'tpl' => 'select_product',
                                    'model' => $model,
                                    'cache_time' => 0,
                                ]) ?>
                            </select>
                        </div>
                    </div>

                    <div class="row" id="atrs"></div>

                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'content')->widget(CKEditor::class, [
                                'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
                            ]); ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?php
                            echo $form->field($model, 'file')->widget(FileInput::class, [
                                'options' => ['accept' => 'image/*'],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showRemove' => false,
                                    'showUpload' => false,
                                    'browseClass' => 'btn btn-primary btn-block',
                                    'browseIcon' => '<i class="fa fa-camera"></i> ',
                                    'browseLabel' => 'Select Photo'
                                ],
                            ])->label('Product image');
                            ?>
                            <div class="form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success submit']) ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <?php
                            echo '<label class="control-label">Additional photos</label>' .
                                FileInput::widget([
                                    'model' => $model,
                                    'attribute' => 'images',
                                    'options' => ['multiple' => true]
                                ]);
                            ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
if (!isset($model->category_id)) {
    $model->category_id = 0;
}
$js = <<<JS
$(document).ready(function() {
    if ($model->category_id) {
        try {
            getAtrs($model->category_id, $_GET[id]);
        } catch (e) {
            console.log(e)
        }
    }
})

function getAtrs(id, prd_id = null) {
    $.ajax({
        url: '/admin/product/get-atributes',
        data: {cat_id: id, product_id: prd_id},
        type: 'GET',
        success: function(res) {
            $('#atrs').html(res.toString())
        },
        error: function() {
            console.log('error')
        }
    })
}
$('#product-category_id').change(function() {
    getAtrs($(this).val())
})
JS;

$this->registerJs($js);

?>
