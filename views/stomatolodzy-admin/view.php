<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StomatolodzyAdmin */

$this->title = $model->id_stomatologa;
$this->params['breadcrumbs'][] = ['label' => 'Stomatolodzy Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stomatolodzy-admin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_stomatologa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_stomatologa], [
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
            'id_stomatologa',
            'imie_nazwisko:ntext',
            'dni_pracy',
        ],
    ]) ?>

</div>
