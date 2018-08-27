<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WizytyAdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wizyty-admin-search">
            <?php
if (Yii::$app->user->identity->role === 30){
    ?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pacjenta') ?>

    <?= $form->field($model, 'id_stomatologa') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'godzina') ?>

    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Wyczyść pola', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); 
        
    }
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}
    
    ?>

</div>
