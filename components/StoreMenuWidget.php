<?php

namespace app\components;

use app\models\Category;
use app\models\Product;
use app\module\seller\models\StoreCategory;
use yii\base\Widget;

class StoreMenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;
    public $seller_id;
    public $cache_time = 60;

    public function init()
    {
        parent::init();
        if($this->ul_class === null){
            $this->ul_class = 'menu';
        }
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        // get cache
//        if($this->cache_time){
//            $menu = \Yii::$app->cache->get('menu');
//            if($menu){
//                return $menu;
//            }
//        }

        $this->data = StoreCategory::find()->where(['seller_id' => $this->seller_id])->select('id, parent_id, title, url')->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = '<ul class="' . $this->ul_class . '">';
        $this->menuHtml .= $this->getMenuHtml($this->tree);
        $this->menuHtml .= '</ul>';

        // set cache
//        if($this->cache_time){
//            \Yii::$app->cache->set('menu', $this->menuHtml, $this->cache_time);
//        }

        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}