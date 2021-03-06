<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=Yii::$app->homeUrl?>" target="_blank" class="brand-link">
        <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=Yii::$app->user->identity->name. ' '. Yii::$app->user->identity->surname?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=\yii\helpers\Url::to(['product/index'])?>" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Products</p>
                    </a>
                </li
                <li class="nav-item">
                    <a href="<?=\yii\helpers\Url::to(['category/index'])?>" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=\yii\helpers\Url::to(['atribute/index'])?>" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Atributes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=\yii\helpers\Url::to(['auth/logout'])?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
