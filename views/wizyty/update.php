<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wizyty */

$this->title = Yii::t('app', 'Update Wizyty: ' . $model->id_pacjenta, [
    'nameAttribute' => '' . $model->id_pacjenta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wizyties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pacjenta, 'url' => ['view', 'id_pacjenta' => $model->id_pacjenta, 'id_stomatologa' => $model->id_stomatologa, 'data' => $model->data, 'godzina' => $model->godzina]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="wizyty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
