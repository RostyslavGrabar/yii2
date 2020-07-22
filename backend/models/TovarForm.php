<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class TovarForm extends Model
{
    public $name;
    public $description;
    public $imageFile;
    public $count;
    public $category_id;
    public $subcategory_id;
    public $price;
    public $discount_id;

    public function  rules()// перевірка
    {
        return [
            [['name', 'description'], 'string', 'message' => 'невірний тип'],            
            [['category_id', 'subcategory_id', 'discount_id'], 'integer', 'message' => 'невірний тип'],            
            [['price'], 'double', 'min' => 0, 'message' => 'невірний тип'],                        
            [['count'], 'integer', 'min' => 0, 'message' => 'невірний тип'],            
            [['name', 'description', 'category_id', 'subcategory_id'], 'required', 'message' => 'значення обов\'язково'],
            [['count', 'price'], 'required',  'message' => 'значення обов\'язково'],            
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 15],
        ];
    }

    public function attributeLabels()// Label
    {
        return [
            'name' => 'Назва товару',
            'description' => 'Опис товару',
            'imageFile' => 'Картинка товару',
            'count' => 'Кількість товару',
            'category_id' => 'Категорія',
            'subcategory_id' => 'Підкатегорія',
            'price' => 'Ціна товару',
            'discount_id' => 'Знижка',

        ];        
    }

    public function upload()
    {
        if($this->validate()){
            $result = [];
            foreach ($this->imageFile as $file){
                $fileName = md5(microtime()) . md5(rand(0, 1000000));
                $imagePath = '../../uploads/tovar/' . $fileName . '.' .  $file->extension;
                $file->saveAs($imagePath);
                $result[] = $imagePath;
            }
            
            return $result;
        }
        return false;
    }
}