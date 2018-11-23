<?php

namespace app\modules\admin\models;

use Yii;
use pistol88\seo;
/**
 * This is the model class for table "kareer".
 *
 * @property int $id
 * @property string $vacaition
 * @property string $description
 *
 * @property KareerEmployee[] $kareerEmployees
 */
class Kareer extends \yii\db\ActiveRecord
{
    function behaviors()
    {
        return [
            'seo' => [
                'class' => 'pistol88\seo\behaviors\SeoFields',
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
            [['vacaition', 'description','date'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
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
            'vacaition' => 'Вакансия',
            'description' => 'Описание вакансии',
            'date'=>'Дата',
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
