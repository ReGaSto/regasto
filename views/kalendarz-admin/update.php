<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KalendarzAdmin */

$this->title = 'Update Kalendarz Admin: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kalendarz Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kalendarz-admin-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
if (Yii::$app->user->identity->role === 30){
    ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ;
}            
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}            
            ?>

</div>
