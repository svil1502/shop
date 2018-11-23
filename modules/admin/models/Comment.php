<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $blog_id
 * @property string $name
 * @property string $email
 * @property string $text
 *
 * @property Blog $blog
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'name', 'email', 'text'], 'required'],
            [['blog_id'], 'integer'],
            [['text'], 'string'],
            [['name', 'email'], 'string', 'max' => 100],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => 'Статья',
            'name' => 'Название',
            'email' => 'Электронная почта',
            'text' => 'Текст',
            'date'=> 'Дата',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }
}
