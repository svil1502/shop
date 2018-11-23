<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $text
 *
 * @property Comment[] $comments
 */
class Blog extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'text', 'date'], 'required'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'text' => 'Текст',
            'date' => 'Дата',
            'image'=> 'Фото',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['blog_id' => 'id']);
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
