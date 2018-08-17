<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use app\models\Stomatolodzy;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\WizytySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wizyty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['create'],
        'method' => 'get',
    ]); ?>

   

    <?= $form->field($model, 'id_stomatologa')->dropDownList(ArrayHelper::map(Stomatolodzy::find()
        ->select(['imie','nazwisko','id_stomatologa'])->all(), 'id_stomatologa', 'displayName'), 
                                                                     ['class' => 'form-control inline-block']);?>

    <?= $form->field($model, 'data')->widget(DatePicker::classname(), [
    'language'=>'pl',//niestety dla pl to nie działa
    'options' => ['placeholder' => 'Wprowadz datę ...'],
    'pluginOptions' => [
        'todayHighlight' => true,
        'format' => 'yyyy-mm-dd',
        'daysOfWeekDisabled' => [0,6],
        'startDate'=>'time()',
        'multidate'=>true,
        'autoclose'=>true,
        ]
    ]);?>

    <?= $form->field($model, 'godzina')->widget(TimePicker::classname(), [
       
    'pluginOptions' => [
        'template' => 'dropdown',
        'minuteStep' => 30,
        'defaultTime'=> 'current',
        'showSeconds' => false,
        'showMeridian' => false,
        'autoclose'=>true,
        
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Potwierdź'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Wyczysc formularz', ['create'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
