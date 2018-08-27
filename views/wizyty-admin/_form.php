<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WizytyAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wizyty-admin-form">
        <?php
if (Yii::$app->user->identity->role === 30){
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pacjenta')->textInput() ?>

    <?= $form->field($model, 'id_stomatologa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'godzina')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
    
    }
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}
    
    ?>

</div>
