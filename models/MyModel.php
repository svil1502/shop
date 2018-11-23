<?php


namespace app\models;
use yii\base\Model;
use app\models\Product;
use Yii;
use app\models\Brand;
use himiklab\sitemap\behaviors\SitemapBehavior;

class MyModel extends \yii\base\Model
{
    public $range;
    public $brand;
    public $id;
    public $min;
    public $max;

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
    public function rules()
    {

return [
    [['range'], 'string'],
    [['brand'], 'string'],
    [['id'], 'integer'],
    [['min'], 'integer'],
    [['max'], 'integer'],
];

    }

    /**
     * Возвращает массив стран
     * @return mixed
     */
    public function getCountriesArray()
    {
        $brands = Brand::find()->all();
        return \yii\helpers\ArrayHelper::map($brands, 'id', 'name');
    }

    public function attributeLabels()
    {
        return [
            'brand' => 'Бренд',

        ];
    }
}