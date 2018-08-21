<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kalendarz2 */

$this->title = 'Update Kalendarz2: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kalendarz2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kalendarz2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
