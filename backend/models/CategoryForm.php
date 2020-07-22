<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class CategoryForm extends Model
{
    public $name;
    public $description;
    public $imageFile;

    public function  rules()// перевірка
    {
        return [
            [['name', 'description'], 'string', 'message' => 'невірний тип'],            
            [['name', 'description'], 'required', 'message' => 'значення обов\'язково'],
     ];
    }

    public function attributeLabels()// Label
    {
        return [
            'name' => 'Назва категорії',
            'description' => 'Опис категорії',
    ];        
    }

}