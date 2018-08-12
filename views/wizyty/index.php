<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Wizyties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Wizyty'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'data',
            'godzina',
            'id_pacjenta',
            'id_stomatologa',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
