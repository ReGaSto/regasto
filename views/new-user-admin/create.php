<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewUserAdmin */

$this->title = 'Create New User Admin';
$this->params['breadcrumbs'][] = ['label' => 'New User Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-user-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
