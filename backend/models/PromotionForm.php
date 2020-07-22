<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class PromotionForm extends Model
{
    public $name;
    public $description;
    public $imageFile;

    public function  rules()// перевірка
    {
        return [
            [['name', 'description'], 'string', 'message' => 'невірний тип'],            
            [['name', 'description'], 'required', 'message' => 'значення обов\'язково'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'message' => 'необхідно завантажити файл'],
        ];
    }

    public function attributeLabels()// Label
    {
        return [
            'name' => 'Назва акції',
            'description' => 'Опис акції',
            'imageFile' => 'Картинка акції',
        ];        
    }

    public function upload()
    {
        if($this->validate('name , description')){
            $this->imageFile->saveAs($this->imagePath());
            return true;
        }
        return false;
    }

    public function imagePath()
    {
        return '../../uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
    }
}