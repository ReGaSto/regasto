<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rezerwacja wizyty');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wizyty zarezerwowane'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Rezerwacja wizyty');

?>
<div class="wizyty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Powrót do zarezerwowanych wizyt'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>
    
    <?= $this->render('_search', [
        'model' => $searchModel,
    ]) ?>
   

   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'data',
            'godzina',
            'id_stomatologa',
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
        ],
    ]
       
   ]); ?>
</div>
