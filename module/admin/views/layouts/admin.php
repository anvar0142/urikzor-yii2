<?php

use app\assets\SellerAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

SellerAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<!--    <base href="/admin/">-->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?=$app['favicon']?>" type="image/x-icon">
    <?php $this->head() ?>

    <!--    <script src="/web/adminlte/plugins/jquery/jquery.min.js"></script>-->
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>

    <?= $this->render('/layouts/inc/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= $this->title ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <?= Breadcrumbs::widget([
                            'homeLink' => ['label' => 'O`rikzor - Store', 'url' => '/seller/'],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= Alert::widget() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <?= $content ?>
        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
