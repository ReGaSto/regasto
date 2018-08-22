<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KalendarzAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kalendarz-admin-form">
    <?php
if (Yii::$app->user->identity->role === 30){
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_rezerwacji')->textInput() ?>

    <?= $form->field($model, 'id_stomatologa')->textInput() ?>

    <?= $form->field($model, 'id_pacjenta')->textInput() ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
 
}
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}
?>
</div>
