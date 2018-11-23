<?php
/**
 * Created by PhpStorm.
 * User: svetlanailina
 * Date: 18.06.18
 * Time: 17:13
 */

namespace app\models;
use yii\db\ActiveRecord;
use himiklab\sitemap\behaviors\SitemapBehavior;

class Brand  extends ActiveRecord
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
    public static function tableName(){
        return 'brand';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['brand_id' => 'id']);
    }


    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID бренда',
            'category_id' => 'Категория',
            'name' => 'Наименование',

        ];
    }

}