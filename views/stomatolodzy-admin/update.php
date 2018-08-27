<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StomatolodzyAdmin */

$this->title = 'Update Stomatolodzy Admin: ' . $model->id_stomatologa;
$this->params['breadcrumbs'][] = ['label' => 'Stomatolodzy Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_stomatologa, 'url' => ['view', 'id' => $model->id_stomatologa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stomatolodzy-admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
