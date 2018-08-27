<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WizytyAdmin */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Wizyty Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-admin-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
if (Yii::$app->user->identity->role === 30){
    ?>
    
    <p>
        <?= Html::a('Update', ['update', 'data' => $model->data, 'godzina' => $model->godzina], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'data' => $model->data, 'godzina' => $model->godzina], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pacjenta',
            'id_stomatologa',
            'data',
            'godzina',
        ],
    ]);
            }
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}
?>?>

</div>
