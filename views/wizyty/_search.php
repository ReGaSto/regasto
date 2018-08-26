<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Wizyty;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\WizytySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wizyty-search">

    <?php
    
$form = ActiveForm::begin([
        'action' => [
            'create'
        ],
        'method' => 'get'
    ]);
    ?>

    <?=$form->field($model, 'id_stomatologa')
        ->dropDownList(ArrayHelper::map(Wizyty::find()
        ->select('id_stomatologa')->all(), 'id_stomatologa', 'id_stomatologa'), ['class' => 'form-control inline-block']);?>

    <?=$form->field($model, 'data')
        ->widget(DatePicker::classname(), [
            'language' => 'pl', 
            'options' => ['placeholder' => 'Wprowadz datę ...'],
            'pluginOptions' => ['todayHighlight' => true,
                                'format' => 'yyyy-mm-dd',
                                'daysOfWeekDisabled' => [0,6],
                                'startDate' => 'time()',
                                'multidate' => true,
                                'autoclose' => true]
            
            ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Szukaj wolnych terminów'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Wyczysc formularz', ['create'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
