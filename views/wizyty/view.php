<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wizyty */

$this->title = $model->id_pacjenta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wizyties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_pacjenta' => $model->id_pacjenta, 'id_stomatologa' => $model->id_stomatologa, 'data' => $model->data, 'godzina' => $model->godzina], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_pacjenta' => $model->id_pacjenta, 'id_stomatologa' => $model->id_stomatologa, 'data' => $model->data, 'godzina' => $model->godzina], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
    ]) ?>

</div>
