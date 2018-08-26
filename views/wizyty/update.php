<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Wizyty;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Wizyty */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Zmieniasz wizytę na...');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Wizyty zarezerwowane'),
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Zmiana wizyty');
?>
<div class="wizyty-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="wizyty-update">
    <?php $form = ActiveForm::begin(); ?>

   	<?=$form->field($searchModel, 'id_stomatologa')
   	    ->dropDownList(ArrayHelper::map(Wizyty::find()
   	    ->select('id_stomatologa')->all(), 'id_stomatologa', 'id_stomatologa'), ['class' => 'form-control inline-block']);?>

    <?=$form->field($searchModel, 'data')
        ->widget(DatePicker::classname(), [
            'language' => 'pl', 
            'options' => ['placeholder' => 'Wprowadz datę ...'],
            'pluginOptions' => ['todayHighlight' => true,
                                'format' => 'yyyy-mm-dd',
                                'daysOfWeekDisabled' => [0,6],
                                'startDate' => 'time()',
                                'multidate' => true,
                                'autoclose' => true]]);?>

   <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Szukaj'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Wyczysc formularz', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
    <?=GridView::widget(['dataProvider' => $dataProvider,'filterModel' => $searchModel,'columns' => ['data','godzina','id_stomatologa',
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
             'buttons' => [
                 'view' => function ($url, $model) {
                  return Html::a('<button type="button" class="btn btn-primary btn-xs">Rezerwuj</button>', $url, [
                     'title' => Yii::t('app', 'Rezerwuj'),
                    ]);
                    }
                    ]
        ],
    ]
       
   ]); ?>
    

</div>
