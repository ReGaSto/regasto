<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use app\models\Stomatolodzy;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Wizyty */

$this->title = Yii::t('app', 'Zmieniasz wizytę na...');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wizyty zarezerwowane'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Zmiana wizyty');
?>
<div class="wizyty-update">

    <h1><?= Html::encode($this->title) ?></h1>


<div class="wizyty-search">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($searchModel, 'id_stomatologa')->dropDownList(ArrayHelper::map(Stomatolodzy::find()
        ->select(['imie','nazwisko','id_stomatologa'])->all(), 'id_stomatologa', 'displayName'), 
                                                                     ['class' => 'form-control inline-block']);?>

    <?= $form->field($searchModel, 'data')->widget(DatePicker::classname(), [
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

    <?= $form->field($searchModel, 'godzina')->widget(TimePicker::classname(), [
       
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
        <?= Html::submitButton(Yii::t('app', 'Szukaj'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Wyczysc formularz', ['update'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'data',
            'godzina',
            'id_stomatologa',
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
        ],
    ]
       
   ]); ?>
    

</div>