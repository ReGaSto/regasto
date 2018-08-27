<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stomatolodzy Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stomatolodzy-admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stomatolodzy Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_stomatologa',
            'imie_nazwisko:ntext',
            'dni_pracy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
