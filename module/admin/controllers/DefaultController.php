<?php

namespace app\module\admin\controllers;

use app\module\admin\controllers\AppAdminController;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSettings() {
        return $this->render('settings');
    }
}
