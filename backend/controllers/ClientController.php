<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
// use backend\models\PromotionForm;
// use backend\models\Promotions;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class ClientController extends Controller
{
    
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionCreate()
    {


        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
   }

    public function actionUpdate($id)
    {
 
    }

    public function actionView($id)
    {

    }
}