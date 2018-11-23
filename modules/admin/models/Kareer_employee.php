<?php

namespace app\modules\admin\models;

use Yii;

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
            [['email'], 'string', 'max' => 30],
            [['kareer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kareer::className(), 'targetAttribute' => ['kareer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kareer_id' => 'Вакансия',
            'name' => 'Фамилия, имя, отчество кандидата',
            'phone' => 'Телефон',
            'email' => 'Электронная почта',
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
