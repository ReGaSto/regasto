<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kalendarz2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalendarz2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kalendarz2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'data_rezerwacji',
            'id_stomatologa',
            'id_pacjenta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
