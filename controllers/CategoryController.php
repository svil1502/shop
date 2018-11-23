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


class CategoryController extends AppController{

    public function actionIndex(){

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();

        $this->setMeta('Автозапчасти');

       $discounts = Discount::find()->where(['slider' => '1'])->limit(3)->all();


        return $this->render('index', compact('hits','discounts'));
    }


    public function actionStart()
    {
//
       $rang2 = Yii::$app->request->get();
       debug($rang2);
//        if (\Yii::$app->request->isAjax) {
//            debug(Yii::$app->request->post());
//
//            return 'data';

      //  }
       // return $this->render('start');
    }
    public function actionView($id){
        // сортировка
        $sort = new Sort([
            'attributes' => [
                'sale'=>[
                    'default' => SORT_DESC,
                    'label' => 'Распродажа',
                ],
                'new'=>[
                    'default' => SORT_DESC,
                    'label' => 'Новинки',
                ],
                'hit'=>[
                    'default' => SORT_DESC,
                    'label' => 'Хиты продаж',
                ],
                'price' =>[
                    'default' => SORT_DESC,
                    'label' => ' Цена',
                ],
                'name' => [
                    'asc' => ['name' => SORT_ASC, 'name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC, 'name' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => ' Название',
                ],
            ],
        ]);

//        $models = Product::find()
//            ->where(['category_id' => $id])
//            ->orderBy($sort->orders);
//
//        $pages = new Pagination(['totalCount' => $models->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
//        $models = $models->offset($pages->offset)->limit($pages->limit)->all();

        //конец сортировки



        if (Yii::$app->request->isPjax) {
            debug($_GET);
            $asc = Yii::$app->request->get('sort');
          if ($asc=='asc') {


               echo " Запрос пришел";
          }
        }

       $asc2 = Yii::$app->request->get('sort');

        $model = new MyModel();

        $array_if = "";
        $brand_find = 1;
        $per1=0;
        $per2=3000;

        $category = Category::findOne($id);
        $query2 = Brand::find()->where(['category_id' => $id]);

        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');

//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $query->andWhere(['between', 'price', $per1, $per2]);


        $product = Product::find()->where(['category_id' => $id])->all();
        $model['min'] =(int)Product::find()->where(['category_id' => $id])->min('price');
        $model['max'] =(int)Product::find()->where(['category_id' => $id])->max('price');
        $brands = $query2->orderBy('name')->all();


        if ($model->load(Yii::$app->request->post())) {


            // Работаем с принятыми данными
            $array_if = explode(',', $model->range);

            $brand_find = $model->id;
            $per1 = $array_if[0];
            $per2 = $array_if[1];
            $brand_find = $model->brand;

            if (!$brand_find) {
                $query = Product::find()->where(['category_id' => $id]);
                $query->andWhere(['between', 'price', $per1, $per2]);
                $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
                $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            } else {
                $query = Product::find()->where(['category_id' => $id, 'brand_id' => $brand_find]);
                $query->andWhere(['between', 'price', $per1, $per2]);
                $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
                $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            }

//        }
//        else {
//            $query = Product::find()->where(['category_id' => $id]);
//            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
//            $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        }
        else {
            $models = Product::find()
                ->where(['category_id' => $id])
                ->orderBy($sort->orders);

            $pages = new Pagination(['totalCount' => $models->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $products = $models->offset($pages->offset)->limit($pages->limit)->all();

        }

        $this->setMeta('Автозапчасти | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('models','sort','asc2','model','products', 'product','pages', 'category','brands','id', 'array_if[0]',  'array_if[1]',  'brand_find','per1' ));



    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('Автозапчасти | Поиск: ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }
//поиск минимальной цены
    public function actionSearchminPrice($id){
        $category = Category::findOne($id);
      // $query2 = Product::find()->where(['category_id' => $id])->min('price');

        //return $this->render('view', compact('query2'));
    }


    public function actionSearchInCategory($id){
        //$id = Yii::$app->request->get('id');

        $min=1000;
        $max=2000;
        $brand_id=3;

        //$category = Category::findOne($id);

        //select * from product where price BETWEEN 1000 and 2000 and category_id=29 and brand_id=3
 //       $query = Product::find()->where(['category_id' => $id],  ['brand_id'=>$brand_id],['between', 'price', $min, $max] );
        $query = Product::find()->where(['category_id' => $id,'brand_id'=>$brand_id]);
        $query->andWhere(['between', 'price', $min, $max]);
        //$query=$query2::find()->where(['between', 'price', $min, $max]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        debug($query);
        return $this->render('search-in-category', compact('products', 'pages', 'id'));
    }



} 