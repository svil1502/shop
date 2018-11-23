<?php

namespace app\models;

use Yii;
use himiklab\sitemap\behaviors\SitemapBehavior;
/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property string $title
 * @property string $text
 * @property string $slider
 */
class Discount extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date', 'description', 'title', 'text'], 'required'],
            [['date'], 'safe'],
            [['slider'], 'string'],
            [['name', 'text'], 'string', 'max' => 1000],
            [['description'], 'string', 'max' => 200],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'title' => 'Title',
            'text' => 'Text',
            'slider' => 'Slider',
        ];
    }
}
