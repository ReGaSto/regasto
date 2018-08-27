<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StomatolodzyAdmin */

$this->title = 'Create Stomatolodzy Admin';
$this->params['breadcrumbs'][] = ['label' => 'Stomatolodzy Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stomatolodzy-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
