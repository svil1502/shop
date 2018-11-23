<?php

namespace app\modules\admin\models;

use Yii;

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
            [['image'], 'file', 'extensions' => 'png, jpg'],
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
            'date' => 'Дата',
            'description' => 'Описание',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'image' => 'Фото',
            'slider' => 'Слайдер',
        ];
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
