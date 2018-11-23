<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 07.05.2016
 * Time: 10:35
 */

namespace app\components;
use yii\base\Widget;
use app\models\Brand;

use Yii;

class MenuWidgetBrand extends Widget{

    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;

    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'menu_brand';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        // get cache
        if ($this->tpl=='menu_brand.php') {
            $menu = Yii::$app->cache->get('menu_brand');
            if($menu) return $menu;
        }

        $this->data = Brand::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        // set cache
        if ($this->tpl=='menu_brand.php') {
            Yii::$app->cache->set('menu_brand', $this->menuHtml, 60);

        }
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {

            $tree[$id] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $brand) {
            $str .= $this->catToTemplate($brand);
        }
        return $str;
    }

    protected function catToTemplate($brand){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}