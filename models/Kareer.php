<?php

namespace app\models;

use Yii;
use himiklab\sitemap\behaviors\SitemapBehavior;
/**
 * This is the model class for table "kareer".
 *
 * @property int $id
 * @property string $vacaition
 * @property string $description
 * @property string $date
 *
 * @property KareerEmployee[] $kareerEmployees
 */
class Kareer extends \yii\db\ActiveRecord
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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kareer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vacaition', 'description', 'date'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['vacaition'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vacaition' => 'Vacaition',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKareerEmployees()
    {
        return $this->hasMany(KareerEmployee::className(), ['kareer_id' => 'id']);
    }
}
