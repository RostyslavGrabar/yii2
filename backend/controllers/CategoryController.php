<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\CategoryForm;
use common\models\Category;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class CategoryController extends Controller
{
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new CategoryForm;
        if($model->load(Yii::$app->request->post())){// яким методлм прийшов запит
            $category = new Category; 
            $category->name = $model->name;
            $category->description = $model->description;
            if ($category->save()){
                $this->redirect(['category/index']);
            }
        
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $category = Category::findOne(['id' => $id]);
        $category->delete();
        $this->redirect(['category/index']);
    }

    public function actionUpdate($id)
    {
        $model = new CategoryForm;
        $category = Category::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post())){// яким методлм прийшов запит
            $category->name = $model->name;
            $category->description = $model->description;
            if ($category->save()){
                $this->redirect(['category/index']);
            }
        
        }
        $model->name = $category->name;
        $model->description = $category->description;
        return $this->render('create', ['model' => $model]);

    }

    public function actionView($id)
    {
        $category = Category::findOne(['id' => $id]);
        return $this->render('view', [
            'category' => $category
        ]);
    }
}