<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\IncomingProducts */
/* @var $form yii\widgets\ActiveForm */
/* @var $products \app\module\admin\models\Product */
?>

    <div class="incoming-products-form">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="incomingproducts-product_id">Select product</label>
                            <select class="form-control" name="IncomingProducts[product_id]"
                                    id="incomingproducts-product_id">
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product['id'] ?>"><?= $product['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'quantity')->textInput() ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'price')->textInput() ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'exch')->textInput() ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'selling_price')->textInput() ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'date')->textInput() ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-sm-12">
                            <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
                            <!--                        --><? //= Html::a('Back', '/admin/incoming-products',['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>

<?php
$script = <<<JS
(function() {
  $('#incomingproducts-price').change(function() {
      p1 = parseFloat($('#incomingproducts-price').val())
      p2 = parseFloat($('#incomingproducts-exch').val())
      let n = (p1/100*p2)+p1
      $('#incomingproducts-selling_price').val(n)
  })
  
$('#incomingproducts-exch').change(function() {
    p1 = parseFloat($('#incomingproducts-price').val())
    p2 = parseFloat($('#incomingproducts-exch').val())
    let n = (p1/100*p2)+p1
    $('#incomingproducts-selling_price').val(n)
})
  
$('#incomingproducts-selling_price').change(function() {
    p1 = parseFloat($('#incomingproducts-price').val())
    p3 = parseFloat($('#incomingproducts-selling_price').val())
    console.log(p1,p3)
    p2 = p3/p1*100-100
    $('#incomingproducts-exch').val(p2.toFixed(2))
})
})(jQuery)
JS;

$this->registerJs($script);
?>