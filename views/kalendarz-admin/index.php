<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kalendarz Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalendarz-admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
if (Yii::$app->user->identity->role === 30){
    ?>
    <p>
        <?= Html::a('Create Kalendarz Admin', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'info:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
}
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}
?>
</div>
