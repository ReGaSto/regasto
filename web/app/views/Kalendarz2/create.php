<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kalendarz */

$this->title = 'Create Kalendarz';
$this->params['breadcrumbs'][] = ['label' => 'Kalendarzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalendarz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
