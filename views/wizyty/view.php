<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wizyty */

$this->title = 'Potwierdzenie rezerwacji';

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Wizyty zarezerwowane'),
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-view">

	<h1><?= Html::encode($this->title) ?></h1>


	<p>
        <?= Html::a(Yii::t('app', 'Rezerwuj'), ['book', 'id_pacjenta' => $model->id_pacjenta, 'id_stomatologa' => $model->id_stomatologa, 'data' => $model->data, 'godzina' => $model->godzina],['class' => 'btn btn-success']); ?>
	    <?= Html::a(Yii::t('app', 'Anuluj rezerwację'), ['create'], ['class' => 'btn btn-warning']); ?>
	</p>

    <?=DetailView::widget(['model' => $model,'attributes' => ['data','godzina','id_stomatologa'],]) ?>

</div>
