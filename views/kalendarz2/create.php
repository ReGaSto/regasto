<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kalendarz2 */

$this->title = 'Create Kalendarz2';
$this->params['breadcrumbs'][] = ['label' => 'Kalendarz2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalendarz2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
