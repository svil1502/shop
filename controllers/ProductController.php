<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.05.2016
 * Time: 10:50
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\models\Brand;

use Yii;

class ProductController extends AppController{
public $img;
    public function actionView($id){
//        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product))
            throw new \yii\web\HttpException(404, 'Такого товара нет');
//        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('Автозапчасти | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }


} 