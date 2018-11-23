<?php

namespace app\models;

use Yii;
use himiklab\sitemap\behaviors\SitemapBehavior;
/**
 * This is the model class for table "kareer_employee".
 *
 * @property int $id
 * @property int $kareer_id
 * @property string $name
 * @property string $phone
 * @property string $email
 *
 * @property Kareer $kareer
 */
class Kareer_employee extends \yii\db\ActiveRecord
{
    public $verifyCode;

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
        return 'kareer_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kareer_id', 'name', 'phone', 'email'], 'required'],
            [['kareer_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 50],
            ['email', 'email'],
            [['kareer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kareer::className(), 'targetAttribute' => ['kareer_id' => 'id']],
            ['verifyCode', 'captcha'],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kareer_id' => 'Kareer ID',
            'name' => 'Фамилия, имя, отчество',
            'phone' => 'Телефон',
            'email' => 'Электронная почта',
            'verifyCode' => 'Каптча',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKareer()
    {
        return $this->hasOne(Kareer::className(), ['id' => 'kareer_id']);
    }
}
