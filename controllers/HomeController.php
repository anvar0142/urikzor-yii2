<?php


namespace app\controllers;


use app\models\ContactForm;
use app\models\Product;
use app\models\Store;
use app\models\Subscribers;
use app\module\admin\models\AppSettings;
use app\module\admin\models\Cart;
use app\module\admin\models\OfferProduct;
use app\module\admin\models\ProductSearch;
use app\module\admin\models\TopProduct;
use app\module\admin\models\TopStore;
use app\module\seller\models\Order;
use Yii;

class HomeController extends AppController
{
    public function actionIndex() {
        return $this->redirect('/admin');
    }
}
