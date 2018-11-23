<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 08.05.2016
 * Time: 10:00
 */

namespace app\controllers;
use app\models\Brand;
use app\models\Category;
use app\models\Product;
use app\models\Discount;
use Yii;
use yii\data\Pagination;
use app\models\MyModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\data\Sort;


class FooterController extends AppController{

    public function actionHits(){

        $hits = Product::find()->where(['hit' => '1']);
        $this->setMeta('Автозапчасти');
        $pages = new Pagination(['totalCount' => $hits->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $hits = $hits->offset($pages->offset)->limit($pages->limit)->all();
        if (empty($hits))
            throw new \yii\web\HttpException(404, 'Таких товаров-хитов нет');


        return $this->render('hits', compact('hits', 'pages'));
    }

    public function actionNew(){

        $news = Product::find()->where(['new' => '1']);
        $this->setMeta('Автозапчасти');
        $pages = new Pagination(['totalCount' => $news->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $news = $news->offset($pages->offset)->limit($pages->limit)->all();
        if (empty($news))
            throw new \yii\web\HttpException(404, 'Таких товаров-новинок нет');



        return $this->render('new', compact('news', 'pages'));
    }

    public function actionSale(){

        $sales = Product::find()->where(['sale' => '1']);
        $this->setMeta('Автозапчасти');
        $pages = new Pagination(['totalCount' => $sales->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $sales = $sales->offset($pages->offset)->limit($pages->limit)->all();
        if (empty($sales))
            throw new \yii\web\HttpException(404, 'Таких товаров по акции нет');



        return $this->render('sale', compact('sales', 'pages'));
    }


    public function actionAbout()
    {
        return $this->render('about');
    }


}