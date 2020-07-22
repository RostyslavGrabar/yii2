<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ClientForm extends Model
{
    public $name;
    public $surname;
    public $lastname;
    public $email;
    public $phone;


    public function  rules()// перевірка
    {
        return [
            [['name', 'surname', 'lastname', 'email', 'phone'], 'string', 'message' => 'невірний тип'],            
            [['name', 'surname', 'lastname', 'email', 'phone'], 'required', 'message' => 'значення обов\'язково'],
     ];
    }

    public function attributeLabels()// Label
    {
        return [
            'name' => 'Ім\'я',
            'surname' => 'Прізвище',
            'lastname' => 'По-батькові',
            'email' => 'Емейл',
            'phone' => 'Телефон',

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