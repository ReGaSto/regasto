<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kalendarz2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kalendarz2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_rezerwacji')->textInput() ?>

    <?= $form->field($model, 'id_stomatologa')->textInput() ?>

    <?= $form->field($model, 'id_pacjenta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
