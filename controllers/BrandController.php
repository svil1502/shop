<?php
/**
 * Created by PhpStorm.
 * User: svetlanailina
 * Date: 18.06.18
 * Time: 17:20
 */

namespace app\controllers;
use app\models\Product;
use app\models\Brand;
use Yii;
use himiklab\sitemap\behaviors\SitemapBehavior;

class BrandController  extends AppController
{
    public function behaviors()
    {
        return [
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['url', 'lastmod']);
                    $model->andWhere(['is_deleted' => 0]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to($model->url, true),
                        'lastmod' => strtotime($model->lastmod),
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8
                    ];
                }
            ],
        ];
    }

    public function actionIndex(){
        $brands = Product::find()->where(['brand_id' => '1'])->limit(6)->all();
        //$this->setMeta('Автозапчасти');
        return $this->render('index', compact('brands'));
    }

    public function actionView($id){
      $id = Yii::$app->request->get('id');
      debug($_GET);



    $brand = Brand::findOne($id);
    if (empty($brand))
        throw new \yii\web\HttpException(404, 'Такого бренда нет');

//        $products = Product::find()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['brand_id' => $id]);
         return $this->render('view', compact('brand'));
    }

}