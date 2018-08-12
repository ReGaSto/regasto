<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Wizyty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wizyty-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'data')->widget(DatePicker::classname(), [
    'language'=>'pl',//niestety dla pl to nie dzia³a
    'options' => ['placeholder' => 'Wprowadz date ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'todayHighlight' => true,
        'format' => 'yyyy-mm-dd',
        'daysOfWeekDisabled' => [0,6],
        'startDate'=>'time()',
    ]
]);?>

    <?= $form->field($model, 'godzina')->textInput() ?>

    <?= $form->field($model, 'id_pacjenta')->textInput() ?>

    <?= $form->field($model, 'id_stomatologa')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
