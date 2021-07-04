<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="login-box">
    <div class="login-logo">
        <a href="/admin"><b>U</b>rikzo`r</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
                <?php  $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'username', ['template' => "
                <div class=\"input-group mb-3\">
                    {input}
                    <div class=\"input-group-append\">
                        <div class=\"input-group-text\">
                            <span class=\"fas fa-user\"></span>
                        </div>
                    </div>
                </div>
                    {error}"])
                ->textInput(['placeholder' => 'Username'])
                ?>
                <?= $form->field($model, 'password', ['template' => "
                    <div class=\"input-group mb-3\">
                        {input}
                        <div class=\"input-group-append\">
                            <div class=\"input-group-text\">
                                <span class=\"fas fa-lock\"></span>
                            </div>
                        </div>
                    </div>
                    {error}"])
                    ->passwordInput(['placeholder' => 'Password'])
                ?>
                <div class="row">
                    <div class="col-8">
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => "{label} {input}"
                        ]) ?>
                    </div>
                    <div class="col-4">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                    <!-- /.col -->
                </div>
            <?php ActiveForm::end() ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
