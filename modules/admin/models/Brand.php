<?php
/**
 * Created by PhpStorm.
 * User: svetlanailina
 * Date: 18.06.18
 * Time: 17:13
 */

namespace app\modules\admin\models;
use yii\db\ActiveRecord;

class Brand  extends ActiveRecord
{
    public static function tableName(){
        return 'brand';
    }
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID бренда',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            
        ];
    }


    public function getProducts(){
        return $this->hasMany(Product::className(), ['brand_id' => 'id']);
    }


    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}