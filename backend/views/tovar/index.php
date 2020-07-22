<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;

    
?>
<div class="row">
    <div class="col-md-12"> 
        <?= Html::a(
            'ДОДАТИ ТОВАР',
            Url::toRoute('tovar/create'),
            [
                'class' => 'btn btn-success pull-right',
                'id' => 'tovar-create'
            ]
            );        
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                'description',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete} {view}',
                    'buttons' => [
                        'update' => function($url, $model, $key){
                            return Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-success']);
                        },
                        'delete' => function($url, $model, $key){
                            return Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-success']);
                        },
                        'view' => function($url, $model, $key){
                            return Html::a('View', ['view', 'id' => $model->id],  ['class' => 'btn btn-success']);
                        },
                    ]
                ]
            ]
        ]);?>
    </div>
</div>