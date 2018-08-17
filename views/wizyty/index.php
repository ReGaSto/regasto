<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Wizyty zarezerwowane');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Rezerwacja nowego terminu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            
            'data',
            'godzina',
            'id_stomatologa',
            

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ]
        
    ]); ?>
</div>
