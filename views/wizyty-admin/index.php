<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WizytyAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edycja Tabeli Wizyty';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?php
if (Yii::$app->user->identity->role === 30){
    ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj termin / rezerwację', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pacjenta',
            'id_stomatologa',
            'data',
            'godzina',

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
