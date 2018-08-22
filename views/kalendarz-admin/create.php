<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KalendarzAdmin */

$this->title = 'Create Kalendarz Admin';
$this->params['breadcrumbs'][] = ['label' => 'Kalendarz Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalendarz-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
if (Yii::$app->user->identity->role === 30){
    ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]); 
}
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}        
        ?>

</div>
